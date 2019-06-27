var galery = new Vue({
    el: "#galery",
    data: {
        urlUploadFile: baseUrl + '/galery/uploadFile',
        urlGetLastFiles: baseUrl + '/galery/getLastFiles',
        backgroundUpload: 'assets/img/upload_img.png',
        classLoading: 'loading',
        uploadFile: false,
        selectedFile: null,
        lastFiles: [],
        previewImage: {
            'nombre': '',
            'fecha_carga': 'Y-m-d'
        }
    },
    methods: {
        onFileChanged(file) {
            console.log(file);
            this.selectedFile = event.target.files[0];
            if (this.selectedFile.size > 5000000) {
                alert("La imagen esta demasiado pesada");
            } else {
                this.uploadFile = true;
                const formData = new FormData();
                formData.append('file', this.selectedFile);

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                axios.post(this.urlUploadFile, formData, config).then((response) => {
                    console.log(response.data);
                    this.uploadFile = false;
                    this.selectedFile = null;
                    if (response.data.code == 200) {
                        this.backgroundUpload = 'assets/uploads/' + response.data.data;
                        this.updateFiles();
                    } else {
                        alert(response.data.message);
                    }
                });
            }
            //console.log(this.selectedFile);
        },
        updateFiles() {
            axios.get(this.urlGetLastFiles).then((response) => {
                this.lastFiles = response.data;
            });
        },
        backgroundImage(file) {
            return baseUrl + '/assets/uploads/' + file.nombre;
        }
    },
    mounted: function() {
        axios.get(this.urlGetLastFiles).then((response) => {
            this.lastFiles = response.data;
            if (response.data.code == 200) {
                this.previewImage = this.lastFiles.data[0];
            }
        });
    }
});