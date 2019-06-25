var app = new Vue({
    el: '#app',
    data: {
        urlGetContents: baseUrl + '/structure/getContents',
        urlCreateStructure: baseUrl + '/structure/createStructure',
        urlGetFields: baseUrl + '/structure/getFields',
        urlCreateField: baseUrl + '/structure/createField',
        contents: [],
        content: '',
        template: 0,
        structureName: '',
        nameField: '',
        descriptionField: '',
        typeField: 1,
        requiredField: false,
        orderField: 0,
        activateOptions: 0,
        activateOptionsImage: 0,
        option: '',
        width: 0,
        height: 0,
        optionsCreate: [],
        fields: []
    },
    methods: {
        enableOptions() {
            this.resetOptions();
            if (this.typeField == 3 || this.typeField == 5) {
                this.activateOptions = 1;
            } else if (this.typeField == 6) {
                this.activateOptionsImage = 1;
            }
        },
        addOption() {
            this.optionsCreate.push(this.option);
            this.option = "";
        },
        removeOption(option) {
            this.optionsCreate.splice(option, 1);
        },
        resetOptions() {
            this.activateOptions = 0;
            this.activateOptionsImage = 0;
        },
        createField() {
            axios.post(this.urlCreateField, {
                nameField: this.nameField,
                descriptionField: this.descriptionField,
                requiredField: this.requiredField,
                optionsCreate: this.optionsCreate,
                width: this.width,
                height: this.height,
                orderField: this.orderField,
                template: this.template,
                typeField: this.typeField
            }).then((response) => {
                if (response.data.code == 200) {
                    this.template = response.data.data;
                    this.updateFields();
                    $("#modal-create").modal('hide');
                } else {
                    alert("Error al crear el template");
                    $("#modal-create").modal('hide');
                }
            });
        },
        createStructure() {
            axios.post(this.urlCreateStructure, {
                template: this.template,
                structureName: this.structureName,
                content: this.content
            }).then((response) => {
                if (response.data.code == 200) {
                    this.template = response.data.data;
                }
                alert(response.data.message);
            });
        },
        updateFields() {
            axios.get(this.urlGetFields + '/' + this.template).then((response) => {
                this.fields = response.data;
            });
        }
    },
    mounted: function() {
        axios.get(this.urlGetContents).then((response) => {
            this.contents = response.data;
        });

    }
})