(function($){
    const settings = $.extend({
        url: '/wp-json/wp/v2/',
        output: null,
        postTemplate: `<div class="post">{{title}}</div>`,
        filterTemplate: `<li>{{name}}</li>`,
        filter: {
            postType: null,
            taxonomy: null,
            orderby: 'date',
            sort: 'desc',
            postsPerPage: null,
            page: 1
        }
    });

    $.fn.ajaxPostTypeFilter = async function(){
        let initialisation;

        settings.output = this;
        settings.filter.postType = this.data('post-type');
        settings.filter.postsPerPage = this.data('posts-per-page');

        initialisation = buildWPQuery();

        let data = await wpAPIEndPointQuery(initialisation);

        renderTemplate(data);
        renderFilters();
    }

    function buildWPQuery(){
        let query;

        query = settings.url + settings.filter.postType;

        return query;
    }

    async function wpAPIEndPointQuery(url){
        return new Promise(function(resolve){
           $.ajax({
               url: encodeURI(url),
               context: document.body
           }).done(function(data){
               (data) ? resolve(data) : resolve(null);
           });
        });
    }

    function applyPostTemplate(post){
        let html = settings.postTemplate;

        html = html.replaceAll('{{title}}', post.title.rendered);

        return html;
    }

    function renderTemplate(posts){
         for(post of posts){
            let postTemplate = applyPostTemplate(post);
            settings.output.append(postTemplate);
         }
    }

    function applyFilterTemplate(post){
        let html = settings.filterTemplate;

        html = html.replaceAll('{{name}}', post.name);

        return html;
    }

    async function renderFilters(){
        (!settings.filter.taxonomy) ? settings.filter.taxonomy = 'categories' : null;

        let posts = await wpAPIEndPointQuery(settings.url + settings.filter.taxonomy);

        for(post of posts){
            let filterTemplate = applyFilterTemplate(post);
            settings.output.append(filterTemplate);
        }
    }
}(jQuery))