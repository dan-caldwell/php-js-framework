export default class PostBody extends Component {

    title(el) {
        el.on.click = () => {
            console.log('The title is...', el.innerText);
        }
    }

}