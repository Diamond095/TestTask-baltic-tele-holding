<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

   
</head>

<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('/js/main.js')}}"></script>
    <p class="red-products">ПРОДУКТЫ</p>
    <div class="red-line"></div>
    <p class="name">Иванов Иван Иванович</p>
    <div class="side-panel">
        <div class="logo-part">
            <div class="logo">
                <img src="{{ asset('/img/Лого.svg') }}" alt="logo">
            </div>
        </div>
    </div>
    <p class="red-products">ПРОДУКТЫ</p>
    <div class="red-line"></div>
    <p class="motto">Enterprise Resource Planning</p>
    <p class="grey-products">
        Продукты
    </p>
    </div>
    <div class="main-panel">
        <p class="column" id="artikul">АРТИКУЛ</p>
        <p class="column" id="name">НАЗВАНИЕ</p>
        <p class="column" id="status">СТАТУС</p>
        <p class="column" id="atributes">АТРИБУТЫ</p>
        <button class="btn-add-1">Добавить</button>
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <div class="top-line"></div>
                    <p class="row" id="artikul">{{ $product->article }}</p>
                    <p class="row" id="name">{{ $product->name }}</p>
                    <p class="row" id="status">{{ $product->status }}</p>
                    <div class="row" id="atributes">
                        @foreach ($product->data as $key => $value)
                            <p class="data">{{ $key }}:{{ $value }}</p>
                        @endforeach
                    </div>
                    <button class="btn-about" id="{{ $product->id }}">Подробнее</button>
                </div>
            @endforeach
        </div>
        <div class="modal">
            <h1>Добавить продукт</h1>
            <img class="close" src="{{ asset('/img/Close_round.svg') }}" id="1" alt="close">
            <div class="add-text">
                <p class="modal-content" id="modal-artikul">Артикул</p>
                <p class="modal-content" id="modal-name">Название</p>
                <p class="modal-content" id="modal-status">Статус</p>
            </div>
            <input class="modal-input" id="artikul-1">
            <input class="modal-input" id="name-1">
            <select class="modal-input" id="status-1">
                <option class="modal-option" value="available">Доступен</option>
                <option value="unavailable">Не доступен</option>
            </select>
            <p class="modal-atributes">Атрибуты</p>
            <div class="some-artibutes"></div>
            <div class="add">
                <p class="add-atribute" id="1">+ Добавить атрибут</p>
                <p class="error-message" id="1"></p>
                <button class="btn-add-2" id="modal">Добавить</button>
            </div>
        </div>
        <div class="modal-update">
            <h1 class="name-update-product"></h1>
            <img class="close" src="{{ asset('/img/Close_round.svg') }}" id="2" alt="close">
            <div class="add-text">
                <p class="modal-content" id="modal-artikul">Артикул</p>
                <p class="modal-content" id="modal-name">Название</p>
                <p class="modal-content" id="modal-status">Статус</p>
            </div>
            <input class="modal-input" id="artikul-2">
            <input class="modal-input" id="name-2">
            <select class="modal-input" id="status-2">
                <option class="modal-option" value="available">Доступен</option>
                <option value="unavailable">Не доступен</option>
            </select>
            <p class="modal-atributes">Атрибуты</p>
            <div class="some-artibutes-2"></div>
            <div class="add-2">
                <p class="add-atribute-2" id="2">+ Добавить атрибут</p>
                <p class="error-message" id="2"></p>
                <button class="btn-add-2" id-product="" id="modal-2">Сохранить</button>
            </div>
        </div>
        <div class="modal-info">
            <img class="close" src="{{ asset('/img/Close_round.svg') }}" alt="close">
            <h2 id="big-name"></h2>
            <div class="product-information">
                <div class="update-background">
                    <img class="logo-update" src="{{ asset('/img/Edit_fill.svg') }}" alt="update">
                </div>
                <img class="logo-delete" src="{{ asset('/img/delete-product.svg') }}" alt="update">
                <div class="text">
                    <p class="information" id="text">Артикул</p>
                    <p class="information" id="text">Название</p>
                    <p class="information" id="text">Статус</p>
                    <p class="information" id="text">Атрибуты</p>
                </div>
                <div class="info">
                    <p class="information" id="modal-artikul-1"></p>
                    <p class="information" id="modal-name-1"></p>
                    <p class="information" id="modal-status-1"></p>
                    <div class="data-info">
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
