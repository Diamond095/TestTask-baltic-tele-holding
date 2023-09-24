
$(document).ready(function() {
    $(".btn-about").click(function() {
        productId = $(this).attr('id');
        $('#modal-2').attr('id-product', productId);
        axios.get("/api/product/" + productId)
            .then(res => {
                if (res.data.status == "available") {
                    res.data.status = "Доступен"
                } else {
                    res.data.status = "Не доступен"
                }
                attributes = Object.entries(res.data.data);
                for (let i = 0; i < attributes.length; i++) {
                    var element = '<p class="data-text">' +
                        attributes[i][0] + ":" + attributes[i][1] + '</p>';
                    $(".data-info").append(element);
                }
                $("#modal-name-1").text(res.data.name).css("color", "#FFF");
                $("#modal-atributes-1").text(JSON.stringify(res.data.data)).css("color",
                    "#FFF");
                $("#modal-artikul-1").text(res.data.article).css("color", "#FFF");
                $("#modal-status-1").text(res.data.status).css("color", "#FFF");
                $('#big-name').text(res.data.name).css("color", "#FFF");
                $(".modal-info").fadeIn();
            });
    });

    $(".logo-update").click(function() {
        let name = $("#modal-name-1").text();
        let status = $("#modal-status-1").text();
        let article = $("#modal-artikul-1").text();
        $(".modal-update").fadeIn();
        $(".modal-info").fadeOut();
        $(".name-update-product").text(name);
        $("#artikul-2").val(article);
        $("#name-2").val(name);
        for (let i = 0; i < attributes.length; i++) {
            $(".modal-update").css("height", "+=65px");
            $(".add-2").css("top", "+=65px");
            var atributeField = `
<div class="form-add-atribute" id="${i}">
  <div class="field">
    <p class="atribute-text">Название</p>
    <input class="input-atribute-1" id="${i}" type="text">
  </div>
  <div class="field"> 
    <p class="atribute-text">Значение</p>
    <input class="input-atribute-2" id="${i}" type="text">
  </div>
  <img src="{{ asset('/img/delete.svg') }}" class="delete-atribute-2">
</div>
`;
            $('.some-artibutes-2').append(atributeField);
            $(`#${i}.input-atribute-1`).val(attributes[i][0]);
            $(`#${i}.input-atribute-2`).val(attributes[i][1]);
        }

    });
    $(".btn-add-1").click(function() {
        $(".modal").fadeIn();
    });

    $("#2.close").click(function() {
        $(".modal").fadeOut();
        for (let i = 0; i < attributes.length; i++) {
            $(".modal-update").css("height", "-=65px");
            $(".add-2").css("top", "-=65px");
            $(`#${i}.form-add-atribute`).remove();
        }
        $(".modal-update").fadeOut();
    });

    $("#1.close").click(function() {
        $(".modal").fadeOut();
    });

    $(".close").click(function() {
        for (let i = 0; i < attributes.length; i++) {
            $(".data-text").remove();
        }
        $(".modal-info").fadeOut();
    });

    $('.logo-delete').click(function() {
        $(".modal-info").fadeOut();
        $(".product").attr('product', )
        axios.delete('/api/product/delete/' + productId);
    });

    $('.btn-add-2#modal').click(function() {
        let name = document.getElementById('name-1').value;
        let article = document.getElementById('artikul-1').value;
        let status = document.getElementById('status-1').value;
        let attributes = {};

        $(".form-add-atribute").each(function() {
            var atributeName = $(this).find(".input-atribute-1").val();
            var atributeValue = $(this).find(".input-atribute-2").val();
            attributes[atributeName] = atributeValue;
        });
        
        axios.post('/api/product/add', {
                name: name,
                article: article,
                status: status,
                data: attributes
            })
            .then(response => {
                this.successMessage = "Отзыв успешно отправлен!";
            })
            .catch(error => {
                $('#1.error-message').text(error.response.data.message);
                $(".modal").css("height", "+=15px");
            });
    });

    $("#1.add-atribute").click(function() {
        $(".modal").css("height", "+=65px");
        $(".add").css("top", "+=65px");
        let i = 1;
        var atributeField = `
<div class="form-add-atribute">
  <div class="field">
    <p class="atribute-text">Название</p>
    <input class="input-atribute-1" id="${i}"  type="text">
  </div>
  <div class="field"> 
    <p class="atribute-text">Значение</p>
    <input class="input-atribute-2" id="${i}" type="text">
  </div>
  <img src="{{ asset('/img/delete.svg') }}"  class="delete-atribute">
</div>
`;
        i++;
        $(".some-artibutes").append(atributeField);
    });
    $("#modal-2").click(function() {
        let productId = $(this).attr('id-product');
        let name2 = document.getElementById('name-2').value;
        let article2 = document.getElementById('artikul-2').value;
        let status2 = document.getElementById('status-2').value;
        var attributes2 = {};

        $(".form-add-atribute").each(function() {
            var atributeName = $(this).find(".input-atribute-1").val();
            var atributeValue = $(this).find(".input-atribute-2").val();
            attributes2[atributeName] = atributeValue;
        });
console.log(attributes2);
        axios.put('/api/product/update/' + productId, {
            name: name2,
            article: article2,
            status: status2,
            data: attributes2
        }).then(
            response = {

            }
        ).catch(error => {
            $('#2.error-message').text(error.response.data.message);
        });
    });
    $("#2.add-atribute-2").click(function() {
        $(".modal-update").css("height", "+=65px");
        $(".add-2").css("top", "+=65px");
        var atributeField = `
<div class="form-add-atribute">
  <div class="field">
    <p class="atribute-text">Название</p>
    <input class="input-atribute-1" type="text">
  </div>
  <div class="field"> 
    <p class="atribute-text">Значение</p>
    <input class="input-atribute-2" type="text">
  </div>
  <img src="{{ asset('/img/delete.svg') }}"  class="delete-atribute-2">
</div>
`;
        $(".some-artibutes-2").append(atributeField);

    });

    $(".modal").on("click", ".delete-atribute", function() {
        $(".modal").css("height", "-=65px");
        $(".add").css("top", "-=65px");
        $(this).parent().remove();
    });

    $(".modal-update").on("click", ".delete-atribute-2", function() {
        $(".modal-update").css("height", "-=65px");
        $(".add-2").css("top", "-=65px");
        $(this).parent().remove();
    });

    $(".modal").on("click", ".delete-atribute", function() {
        $(this).parent().remove();
    });
});