<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Video::insert([
            [
                "title" => "Як в Україні домагались лікування дітей з мукополісахаридозом",
                "description" => "Дронь Кирило, Мустафаєв Тимур. 2013 р",
                "link" => "https://www.youtube.com/embed/Gn7_7DwiBeg",
                "top_id" => 1,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Пам'яті Кирила Дронь.",
                "description" => "Мукополісахаридоз II тип. Історія боротьби Оксани Дронь за лікування свого сина та дітей з мукополісахаридозом в Україні взагалі. Оксана діждалась лікування дітей з МПС але через 9 місяців після серті сина. Наша історія, яку не можна забувати.",
                "link" => "https://www.youtube.com/embed/sppOJa3NSKA",
                "top_id" => 1,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Не буде ліків - дитина помре. Як виживають діти з рідкісними хворобами",
                "description" => "Мукополісахаридоз Україна. Історія Артема",
                "link" => "https://www.youtube.com/embed/KSPb8BLJ_j0",
                "top_id" => 1,
                "date" => "2021-03-11"
            ],
            [
                "title" => "«Мені казали, що я не доживу до 18»",
                "description" => "Історія Дмитра Кулеши. Мукополісахаридоз Україна",
                "link" => "https://www.youtube.com/embed/s4l0x7GNQHw",
                "top_id" => 1,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Він мріє, що стане айтішником А мама додає неодмінно стане, і сам заробить на лікування",
                "description" => "Мукополісахаридоз 4 типу. Історія Богдана",
                "link" => "https://www.youtube.com/embed/u0sM7-mh6lI",
                "top_id" => 2,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Кохання крізь перепони – Вікна новини – 14 02 2019",
                "description" => "Мукополісахаридоз Україна. Історія Дмитра та Олександри",
                "link" => "https://www.youtube.com/embed/6QddYGHPIfw",
                "top_id" => 2,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Історія про дівчинку із сильним характером",
                "description" => "Мукополісахаридоз I тип. Поночевна Аліса. Життя після трансплантації кісткового мозку",
                "link" => "https://www.youtube.com/embed/vuyQjS3Eyo4",
                "top_id" => 2,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Не буде ліків - дитина помре. Як виживають діти з рідкісними хворобами",
                "description" => "Мукополісахаридоз Україна. Історія Артема",
                "link" => "https://www.youtube.com/embed/KSPb8BLJ_j0",
                "top_id" => 1,
                "date" => "2021-03-11"
            ],
            [
                "title" => "Він мріє, що стане айтішником А мама додає неодмінно стане, і сам заробить на лікування",
                "description" => "Мукополісахаридоз 4 типу. Історія Богдана",
                "link" => "https://www.youtube.com/embed/u0sM7-mh6lI",
                "top_id" => 2,
                "date" => "2021-03-11"
            ],
    ]);
    }
}
