<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dodaj.css">
    <title>Додај понуду/аранжман</title>
</head>
<body>
    <header class="header">
        <div class="navtop" >
            <div class="logo">
                <a href=""></a>
            </div>
            <div class="navtop-list">
                <a href="admin.html">Контролна табла</a>
                <a href="index.php">Почетна страна</a>
            </div>
        </div>
    </header>

    <div class="dodaj-ponudu-container">
        <div class="dodaj-left">

                <div class="naslov-container">
                    <h1 class="naslov-dodaj">Додај понуду/аранжман</h1>
                </div>

                <div class="dodaj-inputs">
                    <input type="text" id="Naziv" name="Naziv" placeholder="Назив аранжмана/понуде" required>
                    <input type="text" id="Cena" name="Cena" placeholder="Цена" required>
                </div>
                <div class="dodaj-select-menu">

                    <select id="">
                        <option value="choose">Изабери локацију:</option> <!--повлаче се градови из базе-->
                    </select>

                    <select id="">
                        <option value="choose">Изабери превоз:</option>
                        <option value="bus">Аутобус</option>
                        <option value="train">Воз</option>
                        <option value="plane">Авион</option>
                        <option value="boat">Крстарење</option>
                        <option value="yourself">Самостални</option>
                    </select>
                
                </div>

                <div class="dodaj-date-picker">
                    <input type="date" id="pickDate">

                    <input type="date" id="pickDate">
                </div>

                <div class="btn-dodaj-slike"><button class="button-dodaj">Додај фотографије</button></div>

            </div>
            <div class="dodaj-right">

                <fieldset class="dodaj-tip-smestaja">
                    <legend>Тип смештаја:</legend>
                <div>
                    <input type="radio" id="hotel" name="tip_smestaja">
                    <label for="kes">Хотел</label>
                </div>
            
                <div>
                    <input type="radio" id="bungalov" name="tip_smestaja">
                    <label for="kartica">Бунгалов</label>
                </div>
                </fieldset>
                <div class="dodaj-select-menu">
                    <select>
                        <option value="choose">Категорија смештаја:</option>
                        <option value="choose">1</option>
                        <option value="choose">2</option>
                        <option value="choose">3</option>
                        <option value="choose">4</option>
                        <option value="choose">5</option>
                    </select>
                </div>
            <fieldset class="dodaj-karakteristike">
                <legend>Карактеристике смештаја:</legend>
            <div>
                <input type="checkbox" id="ac" name="ac">
                <label for="ac">Клима</label>
            </div>
            <div>
                <input type="checkbox" id="tv" name="tv">
                <label for="tv">ТВ</label>
            </div>
            <div>
                <input type="checkbox" id="wifi" name="wifi">
                <label for="wifi">Интернет</label>
            </div>
            <div>
                <input type="checkbox" id="frizider" name="frizider">
                <label for="frizider">Фрижидер</label>
            </div>
            <div>
                <input type="checkbox" id="sef" name="sef">
                <label for="sef">Сеф</label>
            </div>
            </fieldset>
            <div class="textareas">
                <textarea style="width: 50%; height: 70px;" class="dodaj-opis" placeholder="Опис"></textarea>
                <textarea style="width: 50%; height: 70px;" class="dodaj-opis" placeholder="Напомена"></textarea>
            </div>

                <div class="dugme-potvrdi-ponudu"><button class="button-dodaj">Додај понуду/аранжман</button></div>

        </div>
    </div>
</body>
</html>
