var app = new Vue({
    el: '#app',
    data: {
        urlGetContents: baseUrl + '/structure/getContents',
        urlCreateContent: baseUrl + '/structure/createContent',
        contents: [],
        requiredField: 0,
        nameContent: ''
    },
    methods: {
        createContent() {
            axios.post(this.urlCreateContent, {
                nameContent: this.nameContent
            }).then((response) => {
                if (response.data.code == 200) {
                    this.updateContents();
                    $("#modal-create-content").modal('hide');
                }
                alert(response.data.message);
            });
        },
        updateContents() {
            axios.get(this.urlGetContents).then((response) => {
                this.contents = response.data;
            });
        }
    },
    mounted: function() {
        axios.get(this.urlGetContents).then((response) => {
            this.contents = response.data;
        });
    }
})