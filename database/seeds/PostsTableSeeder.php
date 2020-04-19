<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        Post::create([
            'title'     => 'Обзор HTTP протокола',
            'body'    => 'HTTP — это протокол, позволяющий получать различные ресурсы, например HTML-документы. Протокол HTTP  лежит в основе обмена данными в Интернете. HTTP является протоколом клиент-серверного взаимодействия, что означает инициирование запросов к серверу самим получателем, обычно веб-браузером (web-browser). Полученный итоговый документ будет (может) состоять из различных поддокументов являющихся частью итогового документа: например, из отдельно полученного текста, описания структуры документа, изображений, видео-файлов, скриптов и многого другого.',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
        Post::create([
            'title'     => 'Описание Стандартов ES',
            'body'    => 'ES — это просто сокращение для ECMAScript. Каждое издание ECMAScript получает аббревиатуру ES с последующим его номером. Всего существует 8 версий ECMAScript. ES1 была выпущена в июне 1997 года, ES2 — в июне 1998 года, ES3 — в декабре 1999 года, а версия ES4 — так и не была принята. Не будем углубляться в эти версии, так как они морально устарели, а рассмотрим только последние четыре.


ES5 был выпущен в декабре 2009 года, спустя 10 лет после выхода третьего издания. Среди изменений можно отметить:

поддержку строгого режима (strict mode);
аксессоры getters и setters;
возможность использовать зарезервированные слова в качестве ключей свойств и ставить запятые в конце массива;
многострочные строковые литералы;
новую функциональность в стандартной библиотеке;
поддержку JSON.
Версия ES6/ES2015 вышла в июне 2015 года. Это также принесло некую путаницу в связи с названием пакета, ведь ES6 и ES2015 — это одно и то же. С выходом этого пакета обновлений комитет принял решение перейти к ежегодным обновлениям. Поэтому издание было переименовано в ES2015, чтобы отражать год релиза. Последующие версии также называются в соответствии с годом их выпуска. В этом обновлении были сделаны следующие изменения:
обавлено деструктурирующее присваивание;
добавлены стрелочные функции;
в шаблонных строках можно объявлять строки с помощью ` (обратных кавычек). Шаблонные строки могут быть многострочными, также могут интерполироваться;
let и const — альтернативы var для объявления переменных. Добавлена «временная мертвая зона»;
итератор и протокол итерации теперь определяют способ перебора любого объекта, а не только массивов. Symbol используется для присвоения итератора к любому объекту;
добавлены функции-генераторы. Они используют yield для создания последовательности элементов. Функции-генераторы могут использовать yield* для делегирования в другую функцию генератора, кроме этого они могут возвращать объект генератора, который реализует оба протокола;
добавлены промисы.
ES2016 (ES7) вышла в июне 2016 года. Среди изменений в этой версии ECMAScript можно отметить:

оператор возведения в степень **;
метод Array.prototype.includes, который проверяет, содержится ли переданный аргумент в массиве.
Спустя еще год выходит версия ES2017 (ES8). Данный стандарт получил следующие изменения:

асинхронность теперь официально поддерживается (async/await);
«висячие» запятые в параметрах функций. Добавлена возможность ставить запятые в конце списка аргументов функций;
добавлено два новых метода для работы со строками: padStart() и padEnd(). Метод padStart() подставляет дополнительные символы слева, перед началом строки. А padEnd(), в свою очередь, справа, после конца строки;
добавлена функция Object.getOwnPropertyDescriptors(), которая возвращает массив с дескрипторами всех собственных свойств объекта;
добавлено разделение памяти и объект Atomics.
Что же касается ES.Next, то этот термин является динамическим и автоматически ссылается на новую версию ECMAScript. Стоит отметить, что каждая новая версия приносит новые функции для языка.',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
        Post::create([
            'title'     => 'Генераторы в JS',
            'body'    => 'Генераторы – новый вид функций в современном JavaScript. Они отличаются от обычных тем, что могут приостанавливать своё выполнение, возвращать промежуточный результат и далее возобновлять его позже, в произвольный момент времени.
Для объявления генератора используется новая синтаксическая конструкция: function* (функция со звёздочкой).

Её называют «функция-генератор» (generator function).
При создании генератора код находится в начале своего выполнения.

Основным методом генератора является next(). При вызове он возобновляет выполнение кода до ближайшего ключевого слова yield. По достижении yield выполнение приостанавливается, а значение – возвращается во внешний код:',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
        Post::create([
            'title'     => 'Семантическая верстка',
            'body'    => 'Семантическая верстка — это изучение значений слов и выражений. В html ничто иное как написание элементов со смыслом. Семантический элемент четко описывает свое значение как для браузеров, так и для разработчиков.

Давайте взглянем на отличие семантического элемента от обычного.

Например div или span — простые элементы, глядя на них мы не можем понять какого типа контент в них содержится. Это может быть просто текст, картинка, или другие теги.

Теперь семантические form, table, и article здесь уже совсем другое дело. Только прочитав названия мы можем с легкостью понять что внутри этих тегов. Пример верстки обычной и семантической:',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
        Post::create([
            'title'     => 'Векторная графика',
            'body'    => '(Scalable Vector Graphics — SVG) является языком разметки расширенным из XML для описания двухмерной векторной графики. SVG по существу является графикой, так же, как XHTML — текстом.

SVG по своим возможностям приближается к запатентованной технологии Adobe Flash, но отличается от неё тем, что SVG является рекомендацией W3C (то есть, стандартом), и тем, что это формат, основанный на XML, в противовес закрытому двоичному формату Flash. Он явно спроектирован для работы с другими стандартами W3C, такими, как CSS, DOM и SMIL. 

SVG-графика и связанные с ней поведения определяются в текстовых XML-файлах, что означает, что их можно искать, индексировать, создавать сценарии и сжимать. Кроме того, это означает, что они могут быть созданы и отредактированы с помощью любого текстового редактора и программ для рисования. 

SVG — открытый стандарт, разработанный  World Wide Web консорциумом (W3C) с 1999 года.',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
        Post::create([
            'title'     => 'Кросс браузерная верстка',
            'body'    => 'Кроссбраузерность — это одинаковое отображение и работа сайта в различных браузерах. Если не задуматься над этим вопросом на этапе верстки, то, создав сайт, вы увидите, что в разных браузерах он отображается по-разному и не везде корректно.

Откуда возникла такая проблема? Дело в том, что браузеры используют разные движки. Браузерный движок занимается загрузкой, обработкой, отображением и расчетами данных. И хоть сегодня существует большое количество различных браузеров, если мы их разложим по используемым движкам, то увидим, что этих движков не так и много, так как создание своего движка является очень трудоемкой задачей.',
            'user_id' => 2,
            'category_id' => 2,
            'is_published' => true
        ]);
    }
}
