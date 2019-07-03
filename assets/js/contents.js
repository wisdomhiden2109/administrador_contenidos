var app = new Vue({
    el: '#app',
    data: {
        urlGetContents: baseUrl + '/structure/getContents',
        urlCreateContent: baseUrl + '/structure/createContent',
        urlUpdateContent: baseUrl + '/structure/updateContent',
        contents: [],
        requiredField: 0,
        nameContent: '',
        mainMenu: 0,
        activeEditModal: 0,
        nameContentEdit: '',
        mainMenuEdit: 0,
        idContentEdit: 0
    },
    methods: {
        createContent() {
            axios.post(this.urlCreateContent, {
                nameContent: this.nameContent,
                mainMenu: this.mainMenu
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
        },
        editContent(content) {
            this.activeEditModal = 1;
            this.idContentEdit = content.id_contenido;
            this.mainMenu = content.menu_principal;
            this.nameContentEdit = content.nombre;
        },
        updateContent(content) {
            axios.post(this.urlUpdateContent, {
                idContent: this.idContentEdit,
                nameContent: this.nameContentEdit,
                mainMenu: this.mainMenuEdit
            }).then((response) => {
                if (response.data.code == 200) {
                    this.updateContents();
                    this.activeEditModal = 0;
                }
                alert(response.data.message);
            });
        }
    },
    mounted: function() {
        axios.get(this.urlGetContents).then((response) => {
            this.contents = response.data;
        });
    }
})