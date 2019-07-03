var app = new Vue({
    el: '#app',
    data: {
        template: window.location.pathname.split('/').pop(),
        urlGetContents: baseUrl + '/structure/getContents',
        urlCreateStructure: baseUrl + '/structure/createStructure',
        urlGetFields: baseUrl + '/structure/getFields',
        urlCreateField: baseUrl + '/structure/createField',
        urlGetDataTemplate: baseUrl + '/structure/getDataTemplate',
        urlUpdateField: baseUrl + '/structure/updateField',
        contents: [],
        content: '',
        contentId: 0,
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
        fields: [],
        // Edit
        activeEditModal: false,
        idField: null, //Id para actualizar campo

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
                    this.resetFormField();
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
                content: this.contentId
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
        },
        editField(field) {
            console.log(field);
            this.idField = field.id_campo;
            this.activeEditModal = true;
            this.nameField = field.nombre;
            this.descriptionField = field.descripcion;
            this.typeField = field.id_tipo;
            this.requiredField = field.requerido;
            this.orderField = field.orden;
            this.width = field.ancho;
            this.height = field.alto;

            switch (field.id_tipo) {
                case ("3" || "4"):
                    this.activateOptions = 1;
                    this.optionsCreate = field.options;
                    break;

                case "6":
                    this.activateOptionsImage = 1;
                    break;

                default:
                    this.activateOptions = 0;
                    this.activateOptionsImage = 0;
                    break;
            }
        },
        updateField() {
            axios.post(this.urlUpdateField, {
                idField: this.idField,
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
                    this.resetFormField();
                    this.activeEditModal = false;
                } else {
                    alert("Error inesperado");
                    this.activeEditModal = false;
                }
            });
        },
        resetFormField() {
            this.nameField = '';
            this.descriptionField = '';
            this.typeField = 1;
            this.requiredField = false;
            this.orderField = 0;
            this.activateOptions = 0;
            this.activateOptionsImage = 0;
            this.option = '';
            this.width = 0;
            this.height = 0;
            this.optionsCreate = [];
        }
    },
    mounted: function() {
        axios.get(this.urlGetContents).then((response) => {
            this.contents = response.data;
        });

        axios.get(this.urlGetDataTemplate + '/' + this.template).then((response) => {
            this.fields = response.data.fields;
            this.content = response.data.info.contenido;
            this.contentId = response.data.info.id_contenido;
            this.structureName = response.data.info.plantilla;
            console.log(response.data);
        });

    }
})