var entries = new Vue({
    el: "#entries",
    data: {
        urlDeleteEntrie: baseUrl + '/eliminar-entrada'
    },
    methods: {
        deleteEntrie(idEntry) {
            axios.post(this.urlDeleteEntrie, {
                idEntry: idEntry
            }).then((response) => {
                if (response.data.code == 200) {
                    location.reload();
                } else {
                    alert(response.data.message);
                }
            });
        }
    }
});