var galery = new Vue({
    el: "#galery",
    data: {
        backgroundUpload: 'assets/img/upload_img.png',
        urlUploadFile: baseUrl + '/galery/uploadFile',
        classLoading: 'loading',
        uploadFile: false,
        selectedFile: null
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
                    } else {
                        alert(response.data.message);
                    }
                });
            }
            //console.log(this.selectedFile);
        }
    }
});