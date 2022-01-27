<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Doctor::insert([
            [
                "lastname" => "Гречаніна",
                "name" => "Олена Яківна",
                "post" => "Доктор медичних наук, професор, член-кореспондент НАМНУ. Директор Українського інституту мітохондріальної і епігеномної медицини ХНМУ.",
                "hospital" => "КНП ХОР «Міжобласний спеціалізований медико-генетичний центр – центр рідкісних (орфанних) захворювань». м. Харків",
                "img_name" => "Grechanina.png",
                "img_path" => "/images/doctors/Grechanina.png",
            ],
            [
                "lastname" => "Бугайова",
                "name" => "Олена Валеріївна",
                "post" => "Лікар-генетик. Кандидат медичних наук. Доцент кафедри медичної генетики ХНМУ.",
                "hospital" => "КНП ХОР «Міжобласний спеціалізований медико-генетичний центр – центр рідкісних (орфанних) захворювань». м. Харків",
                "img_name" => "Bugajova.png",
                "img_path" => "/images/doctors/Bugajova.png",
            ],
            [
                "lastname" => "Шульга",
                "name" => "Наталія Валеріївна",
                "post" => "Завідуюча ендокринологічним центром з ліжками для дітей з рідкісними захворюваннями",
                "hospital" => "КНП ХОР 'Обласна дитяча клінічна  лікарня'. м. Харків",
                "img_name" => "Schulga.png",
                "img_path" => "/images/doctors/Schulga.png",
            ],
            [
                "lastname" => "Комаринська",
                "name" => "Наталія Богданівна",
                "post" => "Лікар-педіатр. Завідувач відділенням мобільного хоспісу",
                "hospital" => "Західноукраїнський спеціалізований дитячий медичний центр. м. Львів",
                "img_name" => "Komarinska.png",
                "img_path" => "/images/doctors/Komarinska.png",
            ],
            [
                "lastname" => "Душар",
                "name" => "Марія Іванівна",
                "post" => "Генетик-педіатр",
                "hospital" => "ДУ ІНСТИТУТ СПАДКОВОЇ ПАТОЛОГІЇ НАЦІОНАЛЬНОЇ АКАДЕМІЇ МЕДИЧНИХ НАУК УКРАЇНИ. м. Львів",
                "img_name" => "Duschar.png",
                "img_path" => "/images/doctors/Duschar.png",
            ],
            [
                "lastname" => "Самоненко",
                "name" => "Наталя В'ячеславівна",
                "post" => "Лікар-педіатр, генетик",
                "hospital" => "Національна дитяча спеціалізована лікарня «Охматдит»ю м. Київ",
                "img_name" => "Samonenko.png",
                "img_path" => "/images/doctors/Samonenko.png",
            ],
            [
                "lastname" => "Пічкур",
                "name" => "Наталя Олександрівна",
                "post" => "Завідувач Центру орфанних захворювань. Лікар-невролог, генетик",
                "hospital" => "Національна дитяча спеціалізована лікарня «Охматдит»ю м. Київ",
                "img_name" => "Pichkur.png",
                "img_path" => "/images/doctors/Pichkur.png",
            ],
        ]);
    }
}
