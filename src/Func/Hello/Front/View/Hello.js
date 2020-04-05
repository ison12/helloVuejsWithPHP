
export default {
    data() {
        return {
            message: 'ニイハオ Vue.js',
            talkMessage: ''
        };
    },
    methods: {
        talk() {

            $.ajax({
                url: AppContext.baseUrl + '/hello/talk'
            }).then((data)=> {
                this.talkMessage = data.talkMessage;
            });

        }
    }
}