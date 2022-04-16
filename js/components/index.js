import SingleSidebarItem from '../../components/sidebar/SingleSidebarItem/single-sidebar-item.js';
import PostBody from '../../components/post/PostBody/post-body.js';
import NextPreviousPost from '../../components/post-navigator/NextPreviousPost/next-previous-post.js';

const components = {
    'single-sidebar-item': SingleSidebarItem,
    'post-body': PostBody,
    'next-previous-post': NextPreviousPost
}
for (const componentName in components) customElements.define(componentName, components[componentName]);