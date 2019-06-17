var app = new Vue({
    el: '#app',
    data: {
        typeField: 1,
        activateOptions: 0,
        option: '',
        optionsCreate: []
    },
    methods: {
        enableOptions() {
            if (this.typeField == 3 || this.typeField == 5) {
                this.activateOptions = 1;
            } else {
                this.activateOptions = 0;
            }
        },
        addOption() {
            this.optionsCreate.push(this.option);
        },
        removeOption(option) {
            console.log(option);
            this.optionsCreate.splice(option, 1);
        }
    }
})