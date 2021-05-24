import $ from 'jquery';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
import 'uikit/dist/js/uikit'
import 'uikit/dist/css/uikit.css';

window.UIkit = UIkit
window.UIkit.use(Icons);
window.jQuery = $;
window.$ = $;

import './scss/style.scss';

function requireAll(r) { r.keys().forEach(r); }
requireAll(require.context('./js/', true, /\.js$/));
