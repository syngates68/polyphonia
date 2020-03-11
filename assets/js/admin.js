$(document).on('click', '.clickable', function()
{
    $('#illustration').click();
});

$(document).on('change', '#illustration', function()
{
    readURL(this);
});

function readURL(input){
    if (input.files && input.files[0]) {

        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

        if (ext == "png" || ext == "jpeg" || ext == "jpg")
        { 
            var reader = new FileReader();
          
            reader.onload = function(e) {
                $.post(baseurl + 'inc/ajouter_image.php',
                {
                    src : e.target.result
                },
                function(data)
                {
                    $('.ajouter_image').html(data).addClass('has_image');
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else
        {
            alert('Vous devez choisir une image au format .jpg, .png ou .jpeg');
        }
    }
}

//Remettre projet en brouillon
$(document).on('click', '.tbl_contenu .tbl_actions .remettre_brouillon', function(e)
{
    e.preventDefault();
    var id = $(this).attr('projet');
    
    if (confirm('Êtes-vous sûr de vouloir remettre ce projet en brouillon?'))
    {
        $.post(baseurl + 'inc/remettre_brouillon.php',
        {
            id_projet : id
        },
        function(data)
        {
            alert(data);
            location.reload();
        });
    }
});