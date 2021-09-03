const app = Vue.createApp({
    data() {
        return {
            plugins: ['SendEmail', 'Telegram', 'Whatsapp'],
            selected: "",
        }
    },
    methods: {
        onChange(event){
            let selected = event.target.value;
            let url = 'core/Bootstrap.php';

            axios.post(url,{ class: selected,function: 'formBuilder' })
                .then((response)=>{
                    //console.log(response);
                    document.getElementById('plugin_wrap').innerHTML =response.data;
                })
                .catch((err) => console.log(err));

        },
    },
});
app.mount('#app');



$(document).on('click','#submit',function(e) {

    e.preventDefault();

    $(this).prop('disabled', true);

    var  fields = $('form').serializeArray(),
         url = 'core/Bootstrap.php';

    axios.post(url, fields)
        .then((response)=>{
          //  console.log(response.data);
            if (response?.data?.success){
                alert('Məlumat uğurla göndərildi !');
               setTimeout(()=>{
                   $('.print-error-msg').addClass('d-none');
                   location.reload();
               },1000);
            }
            else{
                printErrorMessage(response?.data?.errors)
            }
        })
        .catch((err) => console.log(err))
        .finally(()=>{
            $(this).prop('disabled', false);
        });

});


function printErrorMessage (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}