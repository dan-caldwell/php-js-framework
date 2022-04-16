const getPost = async ({
    direction,
    index
}) => {
    
}

export default class NextPreviousPost extends Component {

    buttonStyle = 'bg-blue-500 text-white p-2 rounded-md';

    previousButton(el) {
        el.className = this.buttonStyle;
    }

    nextButton(el) {
        el.className = this.buttonStyle;
    }

}