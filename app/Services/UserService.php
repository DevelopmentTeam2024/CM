<?php

namespace App\Services;

class UserService
{
    public static function getEmployeesList()
    {
        $clients = [
            [
                "EmployeeCode" => "222",
                "EmployeeName" => "ابراهيم محمد ابراهيم سالم"
            ],
            [
                "EmployeeCode" => "112",
                "EmployeeName" => "وليد ابراهيم طلب البسومى"
            ],
            [
                "EmployeeCode" => "113",
                "EmployeeName" => "محمد زكى على حسن"
            ],
            [
                "EmployeeCode" => "555",
                "EmployeeName" => "هشام محمد عبدالله سالم"
            ],
            [
                "EmployeeCode" => "120",
                "EmployeeName" => "محمد ثروت عبد الباقي"
            ],
            [
                "EmployeeCode" => "333",
                "EmployeeName" => "خالد حسن جادالله عثمان"
            ],
            [
                "EmployeeCode" => "117",
                "EmployeeName" => "امجد كامل عاهد حماد"
            ],
            [
                "EmployeeCode" => "118",
                "EmployeeName" => "محمد عبد الله عبد الرحمن الدحيم"
            ],
            [
                "EmployeeCode" => "116",
                "EmployeeName" => "عمرو خليل احمد حرز"
            ],
            [
                "EmployeeCode" => "999",
                "EmployeeName" => "علاء محمد عبد الله مجاهد"
            ],
            [
                "EmployeeCode" => "666",
                "EmployeeName" => "محمد حلاوة"
            ],
            [
                "EmployeeCode" => "123",
                "EmployeeName" => "عبد الرحمن البنيان"
            ],
            [
                "EmployeeCode" => "444",
                "EmployeeName" => "اسماعيل ابو عبدة"
            ],
            [
                "EmployeeCode" => "125",
                "EmployeeName" => " - "
            ],
        ];


        return $clients;
    }
    public static function getAllClientsList()
    {
        $clients = [
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة زاهر العربية للتجارة و التعهدات",
                "CustomerCode" => "00011",
                "Ser" => "1"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة بندر سيف العجمي للمقاولات",
                "CustomerCode" => "01018",
                "Ser" => "2"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مجموعة الاعمال المتعددة للمشاريع",
                "CustomerCode" => "01022",
                "Ser" => "3"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة احمد محمد عبدائم عبد الرحيم للمقاولات",
                "CustomerCode" => "01025",
                "Ser" => "4"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة فائق التقنية للأعمال الميكانيكية والكهربائية",
                "CustomerCode" => "01028",
                "Ser" => "5"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة الأداء الذكي المحدودة",
                "CustomerCode" => "01002",
                "Ser" => "6"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة روتاج للمقاولات",
                "CustomerCode" => "00147",
                "Ser" => "7"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة صرح التقنية للمقاولات",
                "CustomerCode" => "00015",
                "Ser" => "8"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة ارتقاء الدمام للمقاولات",
                "CustomerCode" => "00154",
                "Ser" => "9"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة النسر  التكييف",
                "CustomerCode" => "00156",
                "Ser" => "10"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة التعفف للمقاولات",
                "CustomerCode" => "00158",
                "Ser" => "11"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة بن دايل للمقاولات",
                "CustomerCode" => "00179",
                "Ser" => "12"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مجموعة سدر",
                "CustomerCode" => "00180",
                "Ser" => "13"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة  صخرة الجنوب للمقاولات",
                "CustomerCode" => "00018",
                "Ser" => "14"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ركن سنابل للمقاولات الكهروميكانيكية للمباني",
                "CustomerCode" => "00181",
                "Ser" => "15"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة ماجد الغيث للتكييف",
                "CustomerCode" => "00019",
                "Ser" => "16"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ستا للمقاولات",
                "CustomerCode" => "00192",
                "Ser" => "17"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "السيد / عبد المعين",
                "CustomerCode" => "00013",
                "Ser" => "18"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مجموعة سي وان للمقاولات",
                "CustomerCode" => "00227",
                "Ser" => "19"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة رائد صالح الصعيري للمقاولات",
                "CustomerCode" => "00251",
                "Ser" => "20"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة فجن النتقدمة",
                "CustomerCode" => "00259",
                "Ser" => "21"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الجفالي إليكتروميكانيك",
                "CustomerCode" => "00293",
                "Ser" => "22"
            ],
            [
                "EmployeeCode" => "117",
                "CustomerName" => "مؤسسة إنشاءات عملاقه",
                "CustomerCode" => "00017",
                "Ser" => "23"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة عصام قباني وشركاه لللإنشاءات والصيانة",
                "CustomerCode" => "00244",
                "Ser" => "24"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة بنيان المدائن للمقاولات و الصيانة والتشغيل ال",
                "CustomerCode" => "00031",
                "Ser" => "25"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة هاشم للتجارة والمقاولات",
                "CustomerCode" => "00325",
                "Ser" => "26"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة لينكس للمقاولات",
                "CustomerCode" => "00373",
                "Ser" => "27"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صلة",
                "CustomerCode" => "00374",
                "Ser" => "28"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ميثاق للمقاولات ( شركة شخص واحد ]",
                "CustomerCode" => "00387",
                "Ser" => "29"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ديار نجد للمقاولات",
                "CustomerCode" => "00363",
                "Ser" => "30"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة دايكن للتكييف",
                "CustomerCode" => "00369",
                "Ser" => "31"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "تبريد للتجارة",
                "CustomerCode" => "00415",
                "Ser" => "32"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صحراء ستار",
                "CustomerCode" => "00444",
                "Ser" => "33"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة روشن العقارية",
                "CustomerCode" => "00445",
                "Ser" => "34"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة فياصل نجد للتجارة",
                "CustomerCode" => "00471",
                "Ser" => "35"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اركال للمقاولات",
                "CustomerCode" => "00510",
                "Ser" => "36"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة قروب سى ون للمقاولات",
                "CustomerCode" => "00398",
                "Ser" => "37"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة تفرد الرؤية للاستثمار",
                "CustomerCode" => "00403",
                "Ser" => "38"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الهندسية الاساسية للمقاولات",
                "CustomerCode" => "00531",
                "Ser" => "39"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سنا الابتكار للمقاولات",
                "CustomerCode" => "00059",
                "Ser" => "40"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مهارات التعمير للمقاولات",
                "CustomerCode" => "00596",
                "Ser" => "41"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة البيت العربي للمقاولات",
                "CustomerCode" => "00600",
                "Ser" => "42"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "فرع الشركة الصينية لانشاءات السكك الحديدية السعودي",
                "CustomerCode" => "00529",
                "Ser" => "43"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الفا الخليج للمقاولات",
                "CustomerCode" => "00006",
                "Ser" => "44"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة افاق العمر للمقاولات",
                "CustomerCode" => "00605",
                "Ser" => "45"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بنايات الهندسية للمقاولات",
                "CustomerCode" => "00610",
                "Ser" => "46"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الحلول البسيطة للمقاولات",
                "CustomerCode" => "00611",
                "Ser" => "47"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة اضواء العاذرية للمقاولات",
                "CustomerCode" => "00612",
                "Ser" => "48"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة جاش للخدمات الفنية المحدودة",
                "CustomerCode" => "00613",
                "Ser" => "49"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة التقنية السعودية للمقاولات المحدودة",
                "CustomerCode" => "00615",
                "Ser" => "50"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة سمة الخليج المحدودة",
                "CustomerCode" => "00617",
                "Ser" => "51"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة مصنع عالم الناصرية المحدودة",
                "CustomerCode" => "00062",
                "Ser" => "52"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بكين الامارات",
                "CustomerCode" => "00622",
                "Ser" => "53"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "تضامن وادي البجيدي - دلتا",
                "CustomerCode" => "00626",
                "Ser" => "54"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الهاشمية للتجارة و المقاولات",
                "CustomerCode" => "00629",
                "Ser" => "55"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مسكن العربية للاستثامر والتطوير العقاري",
                "CustomerCode" => "00631",
                "Ser" => "56"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نهج الاعمال للمقاولات",
                "CustomerCode" => "00632",
                "Ser" => "57"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة حمد عبد الله الحبيب للمقاولات",
                "CustomerCode" => "00633",
                "Ser" => "58"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اتحاد متقن للمقاولات",
                "CustomerCode" => "00635",
                "Ser" => "59"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الحفش للنقليات",
                "CustomerCode" => "00572",
                "Ser" => "60"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة ابراهيم السماعيل للمقاولات العامة",
                "CustomerCode" => "00584",
                "Ser" => "61"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة حاتن غازى الحربى للمقاولات",
                "CustomerCode" => "00646",
                "Ser" => "62"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة نموذج البناء المحدودة",
                "CustomerCode" => "00647",
                "Ser" => "63"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الزقزوق لاعمال التكييف والصيانة المحدودة",
                "CustomerCode" => "00648",
                "Ser" => "64"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة دماثة للتجاره",
                "CustomerCode" => "00693",
                "Ser" => "65"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الوسام العربي المحدودة",
                "CustomerCode" => "00694",
                "Ser" => "66"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة عبد الحكيم عبد الله عيسي الجريسى للمقاولات",
                "CustomerCode" => "00652",
                "Ser" => "67"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مكيفات الغيث المحدودة",
                "CustomerCode" => "00672",
                "Ser" => "68"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اسلوب الانشاء للمقاولات",
                "CustomerCode" => "00700",
                "Ser" => "69"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة الأنظمة الخليجية المبتكرة المحدودة",
                "CustomerCode" => "00007",
                "Ser" => "70"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الخبرة الحديثة للمقاولات",
                "CustomerCode" => "00701",
                "Ser" => "71"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة النجوم الثلاثة للتبريد والتكييف",
                "CustomerCode" => "00706",
                "Ser" => "72"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ال مترك للمقاولات و التعهدات",
                "CustomerCode" => "00718",
                "Ser" => "73"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة المهمة الصعبة للمقاولات",
                "CustomerCode" => "00719",
                "Ser" => "74"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة المباني المرنة للمقاولات العامة",
                "CustomerCode" => "00714",
                "Ser" => "75"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة رحاب التنميه للتجاره (شركة شخص واحد]",
                "CustomerCode" => "00715",
                "Ser" => "76"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة إعمار التلال للمقاولات شركةالشخص",
                "CustomerCode" => "00721",
                "Ser" => "77"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة ابناء عبدالرحمن البصيلي للأعمال الكهربائية وا",
                "CustomerCode" => "00993",
                "Ser" => "78"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "موسسه ابراج البحيره للمقاولات",
                "CustomerCode" => "00729",
                "Ser" => "79"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة دار الامارة للمقاولات",
                "CustomerCode" => "00758",
                "Ser" => "80"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة تطوير قواعد البناء للمقاولات عامه",
                "CustomerCode" => "00760",
                "Ser" => "81"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة سليمان البسام التجارية مساهمة مقفلة",
                "CustomerCode" => "00770",
                "Ser" => "82"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اشارة النداء للتجارة والمقاولات",
                "CustomerCode" => "00762",
                "Ser" => "83"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة النظرة المستقبلية للتجارة",
                "CustomerCode" => "00738",
                "Ser" => "84"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة الصيف والناس للمقاولات العامة",
                "CustomerCode" => "00772",
                "Ser" => "85"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "عبد العزيز الراشد",
                "CustomerCode" => "00778",
                "Ser" => "86"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الاصفاء للتجارة",
                "CustomerCode" => "00782",
                "Ser" => "87"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة كوكب جده للمقاولات شركة شخص ذات واحد",
                "CustomerCode" => "00783",
                "Ser" => "88"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الفيحاء للاعمال الانشائية للمقاولات",
                "CustomerCode" => "00784",
                "Ser" => "89"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الابتهاج للمقاولات شركة شخص واحد",
                "CustomerCode" => "00786",
                "Ser" => "90"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة السلطان للتجارة والمقاولات",
                "CustomerCode" => "00788",
                "Ser" => "91"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة فريسينه السعودية العربية",
                "CustomerCode" => "00791",
                "Ser" => "92"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة محمد سعد البواردي وأولاده",
                "CustomerCode" => "00797",
                "Ser" => "93"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة عثمان راشد العثمان للتكييف",
                "CustomerCode" => "00008",
                "Ser" => "94"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة خبراء الجليد للتبريد والتكييف",
                "CustomerCode" => "00809",
                "Ser" => "95"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بلاد الشام للمقاولات العامة شركة شخص واحد",
                "CustomerCode" => "00822",
                "Ser" => "96"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الأنظمة الخليجية المبتكرة للتجارة والمقاولات",
                "CustomerCode" => "00823",
                "Ser" => "97"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة البداد العالمية شركة شخص واحد",
                "CustomerCode" => "00824",
                "Ser" => "98"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة جودت للمقاولات المحدودة",
                "CustomerCode" => "00811",
                "Ser" => "99"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة قوافل الابداع",
                "CustomerCode" => "00832",
                "Ser" => "100"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة التحويل العالمية للمقاولات",
                "CustomerCode" => "00835",
                "Ser" => "101"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة التعمير المتقدمة",
                "CustomerCode" => "00837",
                "Ser" => "102"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة المفهوم الشامل التجارية",
                "CustomerCode" => "00866",
                "Ser" => "103"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة أبنية مبتكرة المحدودة",
                "CustomerCode" => "00874",
                "Ser" => "104"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة أعمار القمة للمقاولات العامة ( محدودة أجنبية",
                "CustomerCode" => "00879",
                "Ser" => "105"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة خبراء التنمية للتكيف والتبريد شركة شخص واحد",
                "CustomerCode" => "00885",
                "Ser" => "106"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الشواف العالمية",
                "CustomerCode" => "00860",
                "Ser" => "107"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الماسي الطبية",
                "CustomerCode" => "00902",
                "Ser" => "108"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة عبدالله عبدالعزيز الرزيحان للمقاولات",
                "CustomerCode" => "00904",
                "Ser" => "109"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة مالك ماجد العبدالعال التجارية",
                "CustomerCode" => "00905",
                "Ser" => "110"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة مجموعة سعيد حسين المالكي للمقاولات",
                "CustomerCode" => "00907",
                "Ser" => "111"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة عبدالله فؤاد",
                "CustomerCode" => "00909",
                "Ser" => "112"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة ناصر عبدالله ابو سرهد وشركاه المحدودة",
                "CustomerCode" => "00920",
                "Ser" => "113"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الحسن الغازي ابراهيم شاكر",
                "CustomerCode" => "00945",
                "Ser" => "114"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة العيوني للاستثمار والمقاولات",
                "CustomerCode" => "00978",
                "Ser" => "115"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة برد الصيف للتبريد والتكييف",
                "CustomerCode" => "00979",
                "Ser" => "116"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بلاد الجود للمقاولات",
                "CustomerCode" => "00980",
                "Ser" => "117"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة حسن علام للإنشاءات السعودية المحدودة",
                "CustomerCode" => "00968",
                "Ser" => "118"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة مملكة الصحراء للمقاولات",
                "CustomerCode" => "00970",
                "Ser" => "119"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة إيماكو للمقاولات",
                "CustomerCode" => "00097",
                "Ser" => "120"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة الدار الشافية للتجارة المحدودة",
                "CustomerCode" => "00974",
                "Ser" => "121"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة محماس عجب النفيعي للمقاولات",
                "CustomerCode" => "00976",
                "Ser" => "122"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة الحمادي القابضة",
                "CustomerCode" => "00977",
                "Ser" => "123"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة عبد الرحمن العثمان للتكييف",
                "CustomerCode" => "00098",
                "Ser" => "124"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة حامد نواز جهته محمد للمقاولات - ذات شخص واحد",
                "CustomerCode" => "00981",
                "Ser" => "125"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مؤسسة أضواء مشاريع التجارية",
                "CustomerCode" => "00983",
                "Ser" => "126"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة عهد الجزيرة للتجارة والمقاولات",
                "CustomerCode" => "00984",
                "Ser" => "127"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة الجلال للمقاولات",
                "CustomerCode" => "00985",
                "Ser" => "128"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "الظلال العربيه للتجاره والمقاولات",
                "CustomerCode" => "00986",
                "Ser" => "129"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة حلول الطاقة المتميزة للمقاولات - شركة شخص واح",
                "CustomerCode" => "00987",
                "Ser" => "130"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة واحة التكييف التجارية",
                "CustomerCode" => "00988",
                "Ser" => "131"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة اليغانسيا العربية التجارية ( شركة شخص واحد ]",
                "CustomerCode" => "00990",
                "Ser" => "132"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة أول تصميم",
                "CustomerCode" => "00099",
                "Ser" => "133"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة جيل الادارة الحديثة للتجارة",
                "CustomerCode" => "00991",
                "Ser" => "134"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة التمساح العربية للمقاولات",
                "CustomerCode" => "00992",
                "Ser" => "135"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة طوق الحمايه للسلامه",
                "CustomerCode" => "00950",
                "Ser" => "136"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سعودي تي كي تي المحدودة",
                "CustomerCode" => "00095",
                "Ser" => "137"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة مرامر للمقاولات شركة مساهمة سعودية مقفلة",
                "CustomerCode" => "00951",
                "Ser" => "138"
            ],
            [
                "EmployeeCode" => "123",
                "CustomerName" => "شركة عابد علي الحبشي للمقاولات",
                "CustomerCode" => "00953",
                "Ser" => "139"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "تحالف الأوسط ومراس مشروع LUCID FACTORY",
                "CustomerCode" => "00936",
                "Ser" => "140"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة باني العالمية المحدودة",
                "CustomerCode" => "00094",
                "Ser" => "141"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة شبكة البناء المحدودة (شركة شخص واحد]",
                "CustomerCode" => "00958",
                "Ser" => "142"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة رواسة المحدودة",
                "CustomerCode" => "00924",
                "Ser" => "143"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة منظومة الالوان للمقاولات",
                "CustomerCode" => "00925",
                "Ser" => "144"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة فوارق الاحترافية لصيانة المعدات",
                "CustomerCode" => "00927",
                "Ser" => "145"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة سام تيك للمقاولات ( شركة شخص واحد ]",
                "CustomerCode" => "00928",
                "Ser" => "146"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة ابراهيم سليمان الراضي وشركاه للتجارة والمقاول",
                "CustomerCode" => "00929",
                "Ser" => "147"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الشقران للتكييف والأعمال الكهروميكانيكية والم",
                "CustomerCode" => "00093",
                "Ser" => "148"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة المصممون المتحدون للمقاولات",
                "CustomerCode" => "00931",
                "Ser" => "149"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة منافع وخدمات الطاقة الصناعية للمقاولات العامة",
                "CustomerCode" => "00932",
                "Ser" => "150"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وجين العالمية المحدودة",
                "CustomerCode" => "00913",
                "Ser" => "151"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الوادي اليانع للمقاولات العامة",
                "CustomerCode" => "00914",
                "Ser" => "152"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة نجمة ميسان للمقاولات",
                "CustomerCode" => "00092",
                "Ser" => "153"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة ابعاد الظل المحدودة",
                "CustomerCode" => "00921",
                "Ser" => "154"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة نيرفانا للمقاولات العامة",
                "CustomerCode" => "00900",
                "Ser" => "155"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة خالد مبروك عبده الشبعاني للمقاولات العامة",
                "CustomerCode" => "00911",
                "Ser" => "156"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة محمود أحمد شعبان وشريكة للمقاولات",
                "CustomerCode" => "00916",
                "Ser" => "157"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة مدارات الشرق الأوسط للتجارة والمقاولات",
                "CustomerCode" => "00917",
                "Ser" => "158"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة وديان للمقاولات",
                "CustomerCode" => "00918",
                "Ser" => "159"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة ساك للتشغيل والصيانة ( شركة شخص واحد ]",
                "CustomerCode" => "00908",
                "Ser" => "160"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الديار المتميزة المحدودة شركة شخص واحد",
                "CustomerCode" => "00906",
                "Ser" => "161"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة قوة المعمار للمقاولات ( شركة شخص واحد ]",
                "CustomerCode" => "00903",
                "Ser" => "162"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "مؤسسة أبواب الاتقان للمقاولات",
                "CustomerCode" => "00861",
                "Ser" => "163"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ادارة المباني والانشاءات السعودية",
                "CustomerCode" => "00862",
                "Ser" => "164"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة احجار المروة للمقاولات العامة",
                "CustomerCode" => "00887",
                "Ser" => "165"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ربوة الرياض للتجارة ( شركة شخص واحد ]",
                "CustomerCode" => "00890",
                "Ser" => "166"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة الإعمار النادر للمقاولات",
                "CustomerCode" => "00089",
                "Ser" => "167"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة خالد سالم عبدالله الوحشي للمقاولات العامة",
                "CustomerCode" => "00891",
                "Ser" => "168"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة دانة العقارية شركة شخص واحد",
                "CustomerCode" => "00892",
                "Ser" => "169"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة نظم التكييف للمقاولات",
                "CustomerCode" => "00893",
                "Ser" => "170"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مؤسسة علي بن احمد بن حسن الشهري للمقاولات",
                "CustomerCode" => "00894",
                "Ser" => "171"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة متن للتجارة والمقاولات المحدوده",
                "CustomerCode" => "00895",
                "Ser" => "172"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة كدن للمقاولات ( شركة شخص واحد ]",
                "CustomerCode" => "00896",
                "Ser" => "173"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة مراهيف للمقاولات",
                "CustomerCode" => "00898",
                "Ser" => "174"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة معيار للمقاولات",
                "CustomerCode" => "00901",
                "Ser" => "175"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة فيصل المحمدي التجارية لصاحبها فيصل احمد المح",
                "CustomerCode" => "00880",
                "Ser" => "176"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسه محمد احمد الزهراني",
                "CustomerCode" => "00088",
                "Ser" => "177"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة معمار نجد المحدودة",
                "CustomerCode" => "00881",
                "Ser" => "178"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة ادرس للخدمات الفنية المساندة شركة شخص واحد",
                "CustomerCode" => "00882",
                "Ser" => "179"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة رقميات الاعمار المحدودة",
                "CustomerCode" => "00883",
                "Ser" => "180"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة القوة المحترفة المحدودة ( شركة شخص واحد ]",
                "CustomerCode" => "00884",
                "Ser" => "181"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة نسيم الريادة للتجارة",
                "CustomerCode" => "00875",
                "Ser" => "182"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الهندسة الكبري للمقاولات شركة شخص واحد",
                "CustomerCode" => "00876",
                "Ser" => "183"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اليسري العربية للمقاولات شركة شخص واحد",
                "CustomerCode" => "00877",
                "Ser" => "184"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة رضايات المحدودة",
                "CustomerCode" => "00867",
                "Ser" => "185"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة عبدالرحمن جمال الزامل للتجارة شركة شخص واحد",
                "CustomerCode" => "00868",
                "Ser" => "186"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة ناصر صالح المكيحلي السبيعي للتكييف والتبريد",
                "CustomerCode" => "00869",
                "Ser" => "187"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "مؤسسة صقر ابراهيم يحيي عطيف للتجارة",
                "CustomerCode" => "00870",
                "Ser" => "188"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة العالمية للهواء والتبريد والتكييف شركة شخص وا",
                "CustomerCode" => "00871",
                "Ser" => "189"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة رواق المواقع المحدودة",
                "CustomerCode" => "00872",
                "Ser" => "190"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة اورباكون السعودية ( شركة شخص واحد ]",
                "CustomerCode" => "00873",
                "Ser" => "191"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة فهد هاشم صالح الشريف للمقاولات العامة",
                "CustomerCode" => "00840",
                "Ser" => "192"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة نفحات الشمال للتكييف والمقاولات",
                "CustomerCode" => "00843",
                "Ser" => "193"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة اركان النسمة للتجارة",
                "CustomerCode" => "00844",
                "Ser" => "194"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة نجم الواحة السعودية للتكييف والتبريد",
                "CustomerCode" => "00848",
                "Ser" => "195"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نبراس الأماكن للتبريد والتكييف",
                "CustomerCode" => "00833",
                "Ser" => "196"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة نبراس الخليج للمقاولات المعمارية العامة شركة",
                "CustomerCode" => "00814",
                "Ser" => "197"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة وصلة السماء للمقاولات",
                "CustomerCode" => "00825",
                "Ser" => "198"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة المنصورية للمقاولات العامة",
                "CustomerCode" => "00828",
                "Ser" => "199"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "سعود النفيسي",
                "CustomerCode" => "00083",
                "Ser" => "200"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الفارس المتطورة للمقاولات",
                "CustomerCode" => "00831",
                "Ser" => "201"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الأجيال الحديثة للمقاولات",
                "CustomerCode" => "00810",
                "Ser" => "202"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الميناء",
                "CustomerCode" => "00081",
                "Ser" => "203"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "عبدالعزيز عبدالخالق المنشري للمقاولات العامة",
                "CustomerCode" => "00802",
                "Ser" => "204"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة أكنان الخليج للمقاولات",
                "CustomerCode" => "00798",
                "Ser" => "205"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "نواف ابو الحسن",
                "CustomerCode" => "00080",
                "Ser" => "206"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة أساسيات إدارة الانشاءات للمقاولات",
                "CustomerCode" => "00790",
                "Ser" => "207"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مصنع الجريل الوطني",
                "CustomerCode" => "00078",
                "Ser" => "208"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة المستقبل الرائدة للمقاولات العامة",
                "CustomerCode" => "00774",
                "Ser" => "209"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة التحكم لأعمال التكييف",
                "CustomerCode" => "00775",
                "Ser" => "210"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة إمكان العمران للمقاولات شركة شخص واحد",
                "CustomerCode" => "00771",
                "Ser" => "211"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة عادل سليمان عبدالعزيز البسام للتكييف والتبري",
                "CustomerCode" => "00763",
                "Ser" => "212"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مجموعة النصبان",
                "CustomerCode" => "00764",
                "Ser" => "213"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة عبدالله ياسر علي السلوم للمقاولات",
                "CustomerCode" => "00734",
                "Ser" => "214"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة العلامة الكاملة للمقاولات العامة",
                "CustomerCode" => "00736",
                "Ser" => "215"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة تل العمارة للمقاولات",
                "CustomerCode" => "00737",
                "Ser" => "216"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "القحطاني و شركاه",
                "CustomerCode" => "00076",
                "Ser" => "217"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مجموعة الحكير",
                "CustomerCode" => "00075",
                "Ser" => "218"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة روائع بلادي المحدوده",
                "CustomerCode" => "00755",
                "Ser" => "219"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة أمان للمقاولات المعمارية",
                "CustomerCode" => "00994",
                "Ser" => "220"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة تل الصافي للتجارة و المقاولات",
                "CustomerCode" => "00096",
                "Ser" => "221"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة أمواج الخير للتجارة والمقاولات",
                "CustomerCode" => "00996",
                "Ser" => "222"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "حلا العامة للمقاولات العامة",
                "CustomerCode" => "00998",
                "Ser" => "223"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة نظم البركه للمقاولات",
                "CustomerCode" => "00999",
                "Ser" => "224"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة فيصل سليمان الخراشي للمقاولات والتجارة",
                "CustomerCode" => "01000",
                "Ser" => "225"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة حيدان الحيدان للمقاولات",
                "CustomerCode" => "00100",
                "Ser" => "226"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة قصر البروده للتكييف",
                "CustomerCode" => "00010",
                "Ser" => "227"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نسمات التميز للمقاولات",
                "CustomerCode" => "00971",
                "Ser" => "228"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة المروج بالاس للمقاولات العامة",
                "CustomerCode" => "00886",
                "Ser" => "229"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة هاشم عبدالرحمن الهاشم لاعمال التكييف المركزي",
                "CustomerCode" => "00839",
                "Ser" => "230"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وصل الخير للمقاولات العامة",
                "CustomerCode" => "00716",
                "Ser" => "231"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة يوسف مرون للمقاولات",
                "CustomerCode" => "00528",
                "Ser" => "232"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مهار الفن للمقاولات شركة شخص واحد",
                "CustomerCode" => "00057",
                "Ser" => "233"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة بوابة التبريد للتكييف والتبريد",
                "CustomerCode" => "00530",
                "Ser" => "234"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة حلول التقنية العالمية للمقاولات",
                "CustomerCode" => "00052",
                "Ser" => "235"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة القلعة الدولية",
                "CustomerCode" => "00213",
                "Ser" => "236"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة أصالة الخليج للتطوير والأستثمار العقاري",
                "CustomerCode" => "00215",
                "Ser" => "237"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة منافذ الطاقة للتكييف والتبريد",
                "CustomerCode" => "01322",
                "Ser" => "238"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الهدا للمقاولات المحدودة",
                "CustomerCode" => "01335",
                "Ser" => "239"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة المفردون للمقاولات",
                "CustomerCode" => "01340",
                "Ser" => "240"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الركن السليم للسلامة",
                "CustomerCode" => "1304",
                "Ser" => "241"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة إعمار نجد للمقاولات العامة شركة شخص واحد",
                "CustomerCode" => "1306",
                "Ser" => "242"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة رندا للتجارة والمقاولات المحدودة",
                "CustomerCode" => "1280",
                "Ser" => "243"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة العبودي للانشاء والتعمير",
                "CustomerCode" => "1182",
                "Ser" => "244"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة اتجاه الهندسة المحدودة",
                "CustomerCode" => "1066",
                "Ser" => "245"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الطوخي للصناعة والتجارة والمقاولات",
                "CustomerCode" => "01160",
                "Ser" => "246"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة اترفته للمقاولات المحدودة",
                "CustomerCode" => "01346",
                "Ser" => "247"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ديار المشروعات التجارية",
                "CustomerCode" => "1316",
                "Ser" => "248"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة مواسم الجزيرة للتجارة والمقاولات العامة",
                "CustomerCode" => "1297",
                "Ser" => "249"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة حلول الميادين الحديثة للتجارة والمقاولات",
                "CustomerCode" => "1298",
                "Ser" => "250"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة أمامة التعمير للمقاولات",
                "CustomerCode" => "00148",
                "Ser" => "251"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة عكل للتجارة والصناعة (مساهمة مقفلة]",
                "CustomerCode" => "00698",
                "Ser" => "252"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة نفال لاعمال التكييف ( الرياض ]",
                "CustomerCode" => "00064",
                "Ser" => "253"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة مشاريع الغد للمقاولات",
                "CustomerCode" => "1311",
                "Ser" => "254"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة نسمات بلادي للتجارة",
                "CustomerCode" => "00082",
                "Ser" => "255"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة تطوير المباني الجاهزة الصناعية",
                "CustomerCode" => "1299",
                "Ser" => "256"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة بنيان المتقدمة للانشاءات والمقاولات",
                "CustomerCode" => "00960",
                "Ser" => "257"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة هدف الحياة للمقاولات العامة شركة شخص واحد",
                "CustomerCode" => "00919",
                "Ser" => "258"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة معم العقارية (شركة شخص واحد]",
                "CustomerCode" => "1300",
                "Ser" => "259"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة سماء الأولي للمقاولات ذات المسؤولية محدودة",
                "CustomerCode" => "00695",
                "Ser" => "260"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة الخدمات البحرية المحدودة",
                "CustomerCode" => "1301",
                "Ser" => "261"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اسيل الخليج لتقنية نظم المعلومات",
                "CustomerCode" => "1302",
                "Ser" => "262"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة دليل المعادن العالمية",
                "CustomerCode" => "00402",
                "Ser" => "263"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "فرع شركة انتر ناشيونال كونسلتنغ اند سيرفيزس",
                "CustomerCode" => "00347",
                "Ser" => "264"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة مصنع قصر عمورية للصناعة والمقاولات",
                "CustomerCode" => "00315",
                "Ser" => "265"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "الشركة السعودية لخدمات الأعمال الكهربائية والميكان",
                "CustomerCode" => "00160",
                "Ser" => "266"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة عبدالله سعيد السيد وشركاؤه للمقاولات",
                "CustomerCode" => "01403",
                "Ser" => "267"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة حدود المنطقة للتجارة",
                "CustomerCode" => "1303",
                "Ser" => "268"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "الشركة الخليجية الاولي للتعهدات والمقاولات",
                "CustomerCode" => "01366",
                "Ser" => "269"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة شذا الاعمار للمقاولات",
                "CustomerCode" => "1229",
                "Ser" => "270"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة ميثاق الترميم للمقاولات",
                "CustomerCode" => "00851",
                "Ser" => "271"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة نسمة اسيا العربية للمقاولات",
                "CustomerCode" => "00962",
                "Ser" => "272"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الفطيم الهندسية للتقنية المحدودة",
                "CustomerCode" => "00989",
                "Ser" => "273"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة بو الفرد المحدودة",
                "CustomerCode" => "01362",
                "Ser" => "274"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة مدرار المتكاملة للمقاولات العامة",
                "CustomerCode" => "01342",
                "Ser" => "275"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مؤسسة التخصصات الهندسية للمقاولات العامة",
                "CustomerCode" => "1305",
                "Ser" => "276"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة القطاع الغربي للمقاولات",
                "CustomerCode" => "01402",
                "Ser" => "277"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "فرع شركة الأوسط العربية للمقاولات",
                "CustomerCode" => "00177",
                "Ser" => "278"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "الشركة الالمانية للخدمات التقنية شركة",
                "CustomerCode" => "00675",
                "Ser" => "279"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة أعمال احمد للتكييف و التبريد",
                "CustomerCode" => "00067",
                "Ser" => "280"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة بيلونز السعودية للمقاولات شركة شخص واحد",
                "CustomerCode" => "1320",
                "Ser" => "281"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مؤنس محمد الشايب للاعمال المدنية موبكو",
                "CustomerCode" => "00131",
                "Ser" => "282"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة قواعد المتحدة للمقاولات",
                "CustomerCode" => "1307",
                "Ser" => "283"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة عاشر الاولي للمقاولات",
                "CustomerCode" => "1270",
                "Ser" => "284"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "البواني-ساليني إمبريجيلو-ساجكو-قاعدة الملك سلمان",
                "CustomerCode" => "01330",
                "Ser" => "285"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة التعهدات والمشاريع الانشائية المحدودة",
                "CustomerCode" => "01351",
                "Ser" => "286"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة قطوف الجزيرة للاستثمار والتجارة",
                "CustomerCode" => "1192",
                "Ser" => "287"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة اكسبيرينس اند اكسلانس المحدودة شركة شخص واحد",
                "CustomerCode" => "00955",
                "Ser" => "288"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة بي اي سي العربية للمقاولات شركة شخص واحد مساه",
                "CustomerCode" => "00705",
                "Ser" => "289"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة واجا",
                "CustomerCode" => "00009",
                "Ser" => "290"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "الشركة الوطنية المتحدة للأعمال الكهروميكانيكية",
                "CustomerCode" => "1308",
                "Ser" => "291"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة البعد المتعدد للمقاولات",
                "CustomerCode" => "1309",
                "Ser" => "292"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة حسين غازى ابراهيم شاكر التجارية",
                "CustomerCode" => "00606",
                "Ser" => "293"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة كفاءة الهواء البارد لأعمال التكييف",
                "CustomerCode" => "1312",
                "Ser" => "294"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة عندنا للمشاريع",
                "CustomerCode" => "1313",
                "Ser" => "295"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة وادي الابرقين للمقاولات",
                "CustomerCode" => "00106",
                "Ser" => "296"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة  التحكم المنتظم للمقاولات",
                "CustomerCode" => "00195",
                "Ser" => "297"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة بناء المعارف للمقاولات العامة",
                "CustomerCode" => "1315",
                "Ser" => "298"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مساندة الإمداد المحدودة شركة شخص واحد",
                "CustomerCode" => "1317",
                "Ser" => "299"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة صمام للتكييف والتبريد ( شركة شخص واحد ]",
                "CustomerCode" => "1216",
                "Ser" => "300"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة أعمال التكييف للتجارة",
                "CustomerCode" => "1318",
                "Ser" => "301"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الغانم انترناشيونال السعودية للتجارة العامة",
                "CustomerCode" => "00146",
                "Ser" => "302"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة فيافي نجد المحدودة",
                "CustomerCode" => "1321",
                "Ser" => "303"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة عادل الحصيني للتحكم الآلي شركة شخص واحد",
                "CustomerCode" => "00134",
                "Ser" => "304"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة انساس السعودية للخدمات الهندسية",
                "CustomerCode" => "01011",
                "Ser" => "305"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة اسرار الرقي للمقاولات",
                "CustomerCode" => "01323",
                "Ser" => "306"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مؤسسة انتماء الخليجية للمقاولات",
                "CustomerCode" => "1239",
                "Ser" => "307"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "أوتاد الشمال للمقاولات المعمارية",
                "CustomerCode" => "01003",
                "Ser" => "308"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة كوادر الصيانة للمقاولات",
                "CustomerCode" => "01365",
                "Ser" => "309"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة واحة الصيف للتكييف",
                "CustomerCode" => "00020",
                "Ser" => "310"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة نافذة الخليج للمقاولات شركة شخص واحد",
                "CustomerCode" => "00795",
                "Ser" => "311"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة غراس البركة للمقاولات العامة",
                "CustomerCode" => "01371",
                "Ser" => "312"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بوابة التقدم للمقاولات",
                "CustomerCode" => "01324",
                "Ser" => "313"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة كيان المبدع المحدودة شركة شخص واحد",
                "CustomerCode" => "01325",
                "Ser" => "314"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة رواد التشييد المحدودة",
                "CustomerCode" => "00834",
                "Ser" => "315"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "فرع شركة كورتيك للانشاءات فرع شركة أجنبية",
                "CustomerCode" => "1289",
                "Ser" => "316"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سيستم أير للأدوات الكهربائية",
                "CustomerCode" => "01332",
                "Ser" => "317"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة لبنات المعمار",
                "CustomerCode" => "1322",
                "Ser" => "318"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وثبة للاستثمار",
                "CustomerCode" => "01360",
                "Ser" => "319"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الاريل للمقاولات والصناعة المحدودة",
                "CustomerCode" => "00666",
                "Ser" => "320"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة أيس المطورة للمقاولات العامة",
                "CustomerCode" => "00224",
                "Ser" => "321"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة نسيم العزيزية للتكييف والخدمات الصناعية",
                "CustomerCode" => "00330",
                "Ser" => "322"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة على بن قشاش العمرى للمقاولات العامة",
                "CustomerCode" => "00574",
                "Ser" => "323"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة شيد المحدودة",
                "CustomerCode" => "00086",
                "Ser" => "324"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مصنع الانارة المتجددة للصناعة",
                "CustomerCode" => "00850",
                "Ser" => "325"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سنمار الرياض للمقاولات",
                "CustomerCode" => "00533",
                "Ser" => "326"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "تحالف شركة نسما وشركاهم وشركتي المباني والانظمة",
                "CustomerCode" => "01374",
                "Ser" => "327"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة بني الخليج للمقاولات",
                "CustomerCode" => "1199",
                "Ser" => "328"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة صفقة النجاح للمقاولات",
                "CustomerCode" => "00115",
                "Ser" => "329"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة كوثر مهدي سليمان العنزي للتجارة",
                "CustomerCode" => "01354",
                "Ser" => "330"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة نسما و شركاهم للمقاولات المحدودة",
                "CustomerCode" => "00135",
                "Ser" => "331"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة التشييد الاختصاصية للمقاولات",
                "CustomerCode" => "01347",
                "Ser" => "332"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الثقة العالمية للمقاولات العامة",
                "CustomerCode" => "01390",
                "Ser" => "333"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة ديمه هايجين العربية للمقاولات شركة الشخص الوا",
                "CustomerCode" => "1238",
                "Ser" => "334"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة مناخات الهواء للمقاولات",
                "CustomerCode" => "00997",
                "Ser" => "335"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة  الإعمار الفريد للمقاولات",
                "CustomerCode" => "00475",
                "Ser" => "336"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة قوة الإعداد المحدودة (شركة شخص واحد]",
                "CustomerCode" => "00212",
                "Ser" => "337"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة نسيم الشام للصيانة",
                "CustomerCode" => "01326",
                "Ser" => "338"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة بيت المبدعون للمقاولات العامة (شركة شخص واحد]",
                "CustomerCode" => "1249",
                "Ser" => "339"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة مجموعة الأعمال المتحدة للمقاولات شركة شخص واح",
                "CustomerCode" => "1196",
                "Ser" => "340"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة تطوير التقنية للمقاولات",
                "CustomerCode" => "00238",
                "Ser" => "341"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة ريحان التكييف للتجارة",
                "CustomerCode" => "00003",
                "Ser" => "342"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة شواطئ البحرين للمقاولات",
                "CustomerCode" => "00041",
                "Ser" => "343"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة مسار الدرب التجارية",
                "CustomerCode" => "00004",
                "Ser" => "344"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شرعاء عبدالرحمن هلال",
                "CustomerCode" => "1225",
                "Ser" => "345"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة حمد عبدالعزيز عبدالرحمن العبيدان للتجارة",
                "CustomerCode" => "1244",
                "Ser" => "346"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة حلول الجزيرة العربية للمقاولات",
                "CustomerCode" => "01356",
                "Ser" => "347"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة هامش للوساطة الرقمية",
                "CustomerCode" => "01328",
                "Ser" => "348"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة سما الجزيرة للمقاولات",
                "CustomerCode" => "01391",
                "Ser" => "349"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة يكاد للتجارة",
                "CustomerCode" => "01395",
                "Ser" => "350"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مراس العالمية للاستثمار",
                "CustomerCode" => "00413",
                "Ser" => "351"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة قوى التعمير المتقدمة للمقاولات شركة شخص واحد",
                "CustomerCode" => "00527",
                "Ser" => "352"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بروسيرفيس انترناشونال للمقاولات",
                "CustomerCode" => "01162",
                "Ser" => "353"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة  صقر الرياض للمقاولات",
                "CustomerCode" => "00002",
                "Ser" => "354"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الامتياز للتبريد والتكييف شركة شخص واحد",
                "CustomerCode" => "00915",
                "Ser" => "355"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة حلول الابداع للمقاولات",
                "CustomerCode" => "1261",
                "Ser" => "356"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة درة الاثر للتجارة للمقاولات",
                "CustomerCode" => "01355",
                "Ser" => "357"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة فيرفو الجبر الشرق الأوسط للتشغيل والصيانة",
                "CustomerCode" => "01338",
                "Ser" => "358"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة خليفة عبد اللطيف الملحم المحدودة",
                "CustomerCode" => "00119",
                "Ser" => "359"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نسائم الابداع للتبريد والتكييف",
                "CustomerCode" => "01329",
                "Ser" => "360"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة اسياد الجزيره للمقاولات",
                "CustomerCode" => "1258",
                "Ser" => "361"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الكريت الدولية للمقاولات المحدوده",
                "CustomerCode" => "01333",
                "Ser" => "362"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة جيتكوم انترناشونال المحدودة",
                "CustomerCode" => "01349",
                "Ser" => "363"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مؤسسة عصام محمد رعد عصام علي رضا التجارية",
                "CustomerCode" => "01401",
                "Ser" => "364"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مجموعة بن لادن السعودية المحدودة",
                "CustomerCode" => "00961",
                "Ser" => "365"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الخليج العالمية للطاقة الكهربائية المحدودة",
                "CustomerCode" => "00982",
                "Ser" => "366"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة فال العربية المحدودة",
                "CustomerCode" => "01013",
                "Ser" => "367"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة مصنع نسمات الربيع لتجهيزات التكييف",
                "CustomerCode" => "00073",
                "Ser" => "368"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة مزيان المعمارية للمقاولات شركة شخص واحد",
                "CustomerCode" => "01331",
                "Ser" => "369"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة يماس العربية للمقاولات",
                "CustomerCode" => "01341",
                "Ser" => "370"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة عبد العزيز محمد صالح الحجاج للمقاولات",
                "CustomerCode" => "1264",
                "Ser" => "371"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة انفين هواء العربية التجارية",
                "CustomerCode" => "00190",
                "Ser" => "372"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة اعمال الطاقة المتخصصة للمقاولات",
                "CustomerCode" => "00266",
                "Ser" => "373"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الفلك للمعدات و التجهيزات الالكترونيه",
                "CustomerCode" => "00045",
                "Ser" => "374"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة ناصر سعيد الهاجري وشركاه للمقاولات",
                "CustomerCode" => "00237",
                "Ser" => "375"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة ماضي بن محمد الهاجري وشركاه",
                "CustomerCode" => "00899",
                "Ser" => "376"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة توسع الدولية لاعمال الالكتروميكانيك",
                "CustomerCode" => "00571",
                "Ser" => "377"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة أجياد التقنية للمقاولات العامة",
                "CustomerCode" => "00586",
                "Ser" => "378"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "الشركة التنفذية العالمية للأعمال  الكهربائية والمي",
                "CustomerCode" => "00263",
                "Ser" => "379"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة المباني - مقاولون عامون",
                "CustomerCode" => "1266",
                "Ser" => "380"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة سحر عوض المالكي للتجارة",
                "CustomerCode" => "01010",
                "Ser" => "381"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة آشي وبشناق للمقاولات شركة مساهمة مقفلة",
                "CustomerCode" => "00973",
                "Ser" => "382"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة سامسونج العربية السعودية المحدودة",
                "CustomerCode" => "00450",
                "Ser" => "383"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة سراكو",
                "CustomerCode" => "00058",
                "Ser" => "384"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الواحة البارده للمقاولات العامة",
                "CustomerCode" => "00077",
                "Ser" => "385"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة القافلة المتحدة للتجارة و المقاولات",
                "CustomerCode" => "00199",
                "Ser" => "386"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة إنماء المعمارية للمقاولات",
                "CustomerCode" => "01396",
                "Ser" => "387"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الخريف لتقنية المياه والطاقة",
                "CustomerCode" => "00944",
                "Ser" => "388"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة رمز الادوات للمقاولات",
                "CustomerCode" => "01352",
                "Ser" => "389"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة جزيرة الفيل للتجارة",
                "CustomerCode" => "00071",
                "Ser" => "390"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بايتور السعودية العربية للانشاءات",
                "CustomerCode" => "00416",
                "Ser" => "391"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة النور الراقي للمقاولات المحدودة",
                "CustomerCode" => "00120",
                "Ser" => "392"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة النسر لأعمال التكييف",
                "CustomerCode" => "00627",
                "Ser" => "393"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الاساسات المتطورة للمقاولات",
                "CustomerCode" => "00922",
                "Ser" => "394"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة القلاع العربية للمقاولات العامة",
                "CustomerCode" => "00208",
                "Ser" => "395"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة شاد المتحدة المحدودة",
                "CustomerCode" => "01392",
                "Ser" => "396"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "الأسس الأولى للمقاولات",
                "CustomerCode" => "00164",
                "Ser" => "397"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة لوذان للمقاولات",
                "CustomerCode" => "00554",
                "Ser" => "398"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة اصالة الأماكن العقارية ( شركة شخص واحد ]",
                "CustomerCode" => "00878",
                "Ser" => "399"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة سنا الهندسة للطاقة ( شركة شخص واحد ]",
                "CustomerCode" => "1220",
                "Ser" => "400"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة النويصر للتجارة والمقاولات",
                "CustomerCode" => "01334",
                "Ser" => "401"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة خلود التجارية للمقاولات",
                "CustomerCode" => "00857",
                "Ser" => "402"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة هديبه خالد العتيبي للتجارة",
                "CustomerCode" => "1263",
                "Ser" => "403"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة كادل للمقاولات",
                "CustomerCode" => "01336",
                "Ser" => "404"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة تمام الجودة للتبريد والتكييف",
                "CustomerCode" => "00934",
                "Ser" => "405"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "الشركة المتقدمة الذهبية للانشاء والتعمير",
                "CustomerCode" => "1172",
                "Ser" => "406"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "رميس للمقاولات",
                "CustomerCode" => "01350",
                "Ser" => "407"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الانشاءات المعتمده للمقاولات",
                "CustomerCode" => "00702",
                "Ser" => "408"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة فنون ميار للمقاولات",
                "CustomerCode" => "00926",
                "Ser" => "409"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة سما الريادة للتجارة",
                "CustomerCode" => "01376",
                "Ser" => "410"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة عكاظ الدولية لصاحبها عبدالله منيع عبدالله",
                "CustomerCode" => "1293",
                "Ser" => "411"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة حمد علي العليوي وشركاه للمقاولات المحدودة",
                "CustomerCode" => "01378",
                "Ser" => "412"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة ابراهيم محمد العبود للتنمية والتطوير",
                "CustomerCode" => "00995",
                "Ser" => "413"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة خدمات الكهرباء والميكانيك والتكييف المحدودة",
                "CustomerCode" => "00912",
                "Ser" => "414"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مصنع واحة انجاز للصناعات المعدنية",
                "CustomerCode" => "1314",
                "Ser" => "415"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة عبدالله عبدالمجيد الفرج للمقاولات",
                "CustomerCode" => "01404",
                "Ser" => "416"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة شام المستقبل للمقاولات",
                "CustomerCode" => "00933",
                "Ser" => "417"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة نهج الرجاء للتجارة والمقاولات",
                "CustomerCode" => "00391",
                "Ser" => "418"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الزامل للصيانة والتشغيل المحدودة",
                "CustomerCode" => "01337",
                "Ser" => "419"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الخليفة لأعمال الكهرباء والميكانيكا",
                "CustomerCode" => "00260",
                "Ser" => "420"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صفوة المباني للمقاولات شركة شخص واحد",
                "CustomerCode" => "00781",
                "Ser" => "421"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة مواصفات للمقاولات",
                "CustomerCode" => "01394",
                "Ser" => "422"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة نزار نزار نقشبندي للمقاولات",
                "CustomerCode" => "01387",
                "Ser" => "423"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة عمر ملحم للمقاولات شركة شخص واحد",
                "CustomerCode" => "1267",
                "Ser" => "424"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة ايراب للمقاولات",
                "CustomerCode" => "00930",
                "Ser" => "425"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة داريا العربية المحدودة",
                "CustomerCode" => "01339",
                "Ser" => "426"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة المقاولون المبتكرون للمعايير المتطورة",
                "CustomerCode" => "00555",
                "Ser" => "427"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة كازا التجارية",
                "CustomerCode" => "00524",
                "Ser" => "428"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "الشركة الفنية لتنفيذ الاعمال الكهروميكانيكية المحد",
                "CustomerCode" => "00370",
                "Ser" => "429"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة تحسين المتحدة للمقاولات العامة المحدودة",
                "CustomerCode" => "01343",
                "Ser" => "430"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة أركن الخليج للمقاولات",
                "CustomerCode" => "01344",
                "Ser" => "431"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة أملاك المتخصصة للمقاولات",
                "CustomerCode" => "01386",
                "Ser" => "432"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة خالد بن أحمد القصيبى للمقاولات",
                "CustomerCode" => "00247",
                "Ser" => "433"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الجبر للمقاولات العامة شركة الشخص الواحد",
                "CustomerCode" => "00221",
                "Ser" => "434"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة خبراء التكييف والأعمال الالكتروميكانيكية",
                "CustomerCode" => "00151",
                "Ser" => "435"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة عبدالله المسحل للمقاولات شركة شخص",
                "CustomerCode" => "00699",
                "Ser" => "436"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة مكارم النجاح للتطوير العقاري",
                "CustomerCode" => "01384",
                "Ser" => "437"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة محمد حرب ابراهيم نجمي للمقاولات",
                "CustomerCode" => "1210",
                "Ser" => "438"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة فادن للمقاولات",
                "CustomerCode" => "00322",
                "Ser" => "439"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة اهاكو للمقاولات العامة",
                "CustomerCode" => "01345",
                "Ser" => "440"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة عيد حسين التميمي للمقاولات العامة",
                "CustomerCode" => "01348",
                "Ser" => "441"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الثقة العظمى  للمقاولات",
                "CustomerCode" => "00130",
                "Ser" => "442"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الانظمة الذكية لأعمال التكييف ( شركة شخص واحد",
                "CustomerCode" => "00074",
                "Ser" => "443"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة دوائر الشرق للمقاولات",
                "CustomerCode" => "00129",
                "Ser" => "444"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "بواني - ساليني امبريجيلو - ساجكو - مشروع مشترك",
                "CustomerCode" => "00910",
                "Ser" => "445"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة ميار القمر للمقاولات العامة",
                "CustomerCode" => "00863",
                "Ser" => "446"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة وحدة الإنشاءات للمقاولات شركة شخص واحد",
                "CustomerCode" => "01363",
                "Ser" => "447"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة جفير العالميه للمقاولات",
                "CustomerCode" => "00747",
                "Ser" => "448"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة هاشم عبدالعزيز فيصل المبارك لاعمال التكييف",
                "CustomerCode" => "01358",
                "Ser" => "449"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "شركة مفاز الانجاز للمقاولات العامة",
                "CustomerCode" => "01359",
                "Ser" => "450"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة تمعن الخليج للمقاولات العامة",
                "CustomerCode" => "01364",
                "Ser" => "451"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة كيان البلاد للمقاولات - سليمان محمد الربدى",
                "CustomerCode" => "1242",
                "Ser" => "452"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة مصنع ابراهيم حسن عجلان العجلان للمكيفات",
                "CustomerCode" => "00016",
                "Ser" => "453"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الرامسات للمقاولات شركة شخص واحد",
                "CustomerCode" => "01383",
                "Ser" => "454"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة محمد ناصر عبدالله أبو عيد للصناعة والمقاولات",
                "CustomerCode" => "00827",
                "Ser" => "455"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مطابقة الجودة المحدودة",
                "CustomerCode" => "01373",
                "Ser" => "456"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة إدارة التنفيذ للمقاولات العامة",
                "CustomerCode" => "01379",
                "Ser" => "457"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة أنماط المعمار للمقاولات",
                "CustomerCode" => "1209",
                "Ser" => "458"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الاعتماد العربي للتجارة",
                "CustomerCode" => "01375",
                "Ser" => "459"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مؤسسة اصداف الغربية للمقاولات",
                "CustomerCode" => "01400",
                "Ser" => "460"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة الخزامى لاعمال التكييف",
                "CustomerCode" => "00523",
                "Ser" => "461"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة فاستك للمقاولات",
                "CustomerCode" => "01377",
                "Ser" => "462"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة السلامة الدائمة للمقاولات",
                "CustomerCode" => "01380",
                "Ser" => "463"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة تترا العالمية للتشغيل والصيانة",
                "CustomerCode" => "01381",
                "Ser" => "464"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة شمائل الخليج للمقاولات",
                "CustomerCode" => "01382",
                "Ser" => "465"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الجيل الحديث العربية لنظم العمليات المحدودة",
                "CustomerCode" => "00817",
                "Ser" => "466"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الزهراء الحديثة للتكييف المركزي",
                "CustomerCode" => "00856",
                "Ser" => "467"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة مدار الشمال للمقاولات",
                "CustomerCode" => "00849",
                "Ser" => "468"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة قادة البناء الحديث",
                "CustomerCode" => "01385",
                "Ser" => "469"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة دار أصالة للمقاولات",
                "CustomerCode" => "01388",
                "Ser" => "470"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مؤسسة نسائم الربيع",
                "CustomerCode" => "01389",
                "Ser" => "471"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بناء بيتكو للمقاولات",
                "CustomerCode" => "01393",
                "Ser" => "472"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الاهم للاعمال المدنية والانشائية",
                "CustomerCode" => "00644",
                "Ser" => "473"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة أوقات الجودة للمقاولات",
                "CustomerCode" => "01399",
                "Ser" => "474"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة التاج المضيئ للمقاولات",
                "CustomerCode" => "00854",
                "Ser" => "475"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة رموز الاتحاد الخليجي للمقاولات",
                "CustomerCode" => "00663",
                "Ser" => "476"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "فرع شركة ديزاين دي لابيل",
                "CustomerCode" => "01397",
                "Ser" => "477"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة عفيفي للمقاولات",
                "CustomerCode" => "00091",
                "Ser" => "478"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ادكس للمقاولات والصيانة والتشغيل",
                "CustomerCode" => "00051",
                "Ser" => "479"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة القيادات العالمية للتجارة",
                "CustomerCode" => "00724",
                "Ser" => "480"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الأداء المنتظم",
                "CustomerCode" => "00717",
                "Ser" => "481"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة هندا العالمية للتكييف والتبريد شركة شخص واحد",
                "CustomerCode" => "00720",
                "Ser" => "482"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة إشراقة الرياض للمقاولات العامه",
                "CustomerCode" => "00072",
                "Ser" => "483"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة أفاق لتشكيل المعادن شركة شخص",
                "CustomerCode" => "00713",
                "Ser" => "484"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة  أنصار المجد للمقاولات",
                "CustomerCode" => "00070",
                "Ser" => "485"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة كياني الأمثل للتجارة",
                "CustomerCode" => "00066",
                "Ser" => "486"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة السيف مهندسون مقاولون المحدودة",
                "CustomerCode" => "00661",
                "Ser" => "487"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة منظور التشييد العربي",
                "CustomerCode" => "00667",
                "Ser" => "488"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة أناقة الشرقية التجارية",
                "CustomerCode" => "00670",
                "Ser" => "489"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة فال للهندسة التكييف",
                "CustomerCode" => "00065",
                "Ser" => "490"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "فهد الرشود",
                "CustomerCode" => "00651",
                "Ser" => "491"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة دروب الشرقية للمقاولات",
                "CustomerCode" => "00641",
                "Ser" => "492"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "ايمن حسن حمدي الجهني",
                "CustomerCode" => "00676",
                "Ser" => "493"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مجموعة عبدالله عوض الجوهي للمقاولات",
                "CustomerCode" => "00677",
                "Ser" => "494"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة كيان فور للمقاولات",
                "CustomerCode" => "00678",
                "Ser" => "495"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مركز الواحة السعودية للتكييف",
                "CustomerCode" => "00068",
                "Ser" => "496"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة ميز الخليج",
                "CustomerCode" => "00682",
                "Ser" => "497"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة مصافي المحدودة",
                "CustomerCode" => "00683",
                "Ser" => "498"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة براد الصيف لاعمال التكييف",
                "CustomerCode" => "00684",
                "Ser" => "499"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة سهول للتطوير",
                "CustomerCode" => "00069",
                "Ser" => "500"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة تكنولوجيا الميكانيك للصناعة",
                "CustomerCode" => "00692",
                "Ser" => "501"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة قارة المتطورة للمقاولات العامة",
                "CustomerCode" => "00637",
                "Ser" => "502"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة عراقة الكفاءات للمقاولات",
                "CustomerCode" => "00640",
                "Ser" => "503"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ابشر المتحدة للمقاولات",
                "CustomerCode" => "00630",
                "Ser" => "504"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة ديم السلام للتكييف",
                "CustomerCode" => "00063",
                "Ser" => "505"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة البواني المحدودة وشبه الجزيرة – مشروع مشترك",
                "CustomerCode" => "00621",
                "Ser" => "506"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة أبراد النهار للمقاولات",
                "CustomerCode" => "00061",
                "Ser" => "507"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة حنان مرزوق مسعود العتيبى",
                "CustomerCode" => "00609",
                "Ser" => "508"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة أوتاد الفهد المحدودة",
                "CustomerCode" => "00601",
                "Ser" => "509"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "أ. خالد وليد",
                "CustomerCode" => "00604",
                "Ser" => "510"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة العيسى للمقاولات",
                "CustomerCode" => "00053",
                "Ser" => "511"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الشراع للتكييف والطاقة المحدودة",
                "CustomerCode" => "00060",
                "Ser" => "512"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "الشركه السعوديه لإعاده التأمين",
                "CustomerCode" => "00556",
                "Ser" => "513"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة بيت الجليد",
                "CustomerCode" => "00056",
                "Ser" => "514"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة عبد العزيز مزروع المزروع للمقاولات",
                "CustomerCode" => "00565",
                "Ser" => "515"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة خالد يوسف عبدالعزيز القوسي للمقاولات العامة",
                "CustomerCode" => "00587",
                "Ser" => "516"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة اتقان العقارية",
                "CustomerCode" => "00409",
                "Ser" => "517"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الاميري للتجارة والنقاولات",
                "CustomerCode" => "00412",
                "Ser" => "518"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "دعامات البناء للمقاولات",
                "CustomerCode" => "00040",
                "Ser" => "519"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة طريق الهواء التجارية",
                "CustomerCode" => "00401",
                "Ser" => "520"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة جودة الابداع الحديثة للمقاولات",
                "CustomerCode" => "00514",
                "Ser" => "521"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة مدى العرب للمقاولات",
                "CustomerCode" => "00519",
                "Ser" => "522"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الرمز السعودي",
                "CustomerCode" => "00525",
                "Ser" => "523"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "زهران للتشغيل والصيانة",
                "CustomerCode" => "00536",
                "Ser" => "524"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "سواعد التشيد للتجارة",
                "CustomerCode" => "00537",
                "Ser" => "525"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مستشفى الصاعدى",
                "CustomerCode" => "00540",
                "Ser" => "526"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة خبير التكييف للمقاولات العامة",
                "CustomerCode" => "00054",
                "Ser" => "527"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة ركائز المدن المتقدمة للمقاولات",
                "CustomerCode" => "00543",
                "Ser" => "528"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركه الحميدي صقر المورقي",
                "CustomerCode" => "00547",
                "Ser" => "529"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة مجموعة الفؤاد للتجارة و المقاولات المحدوده",
                "CustomerCode" => "00055",
                "Ser" => "530"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الذكية للاعمال الميكانيكية والمقاولات",
                "CustomerCode" => "00472",
                "Ser" => "531"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ميراس السعودية للمقاولات",
                "CustomerCode" => "00474",
                "Ser" => "532"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مفاتيح التطوير للاستشارات الهندسيه",
                "CustomerCode" => "00479",
                "Ser" => "533"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة بيت الانماء للمقاولات",
                "CustomerCode" => "00048",
                "Ser" => "534"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة دلتا العربية المحدودة",
                "CustomerCode" => "00483",
                "Ser" => "535"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة هواك للتجارة",
                "CustomerCode" => "00486",
                "Ser" => "536"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة تشكيل الهواء للمقاولات",
                "CustomerCode" => "00049",
                "Ser" => "537"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مركز ماجد ابراهيم الرشيدان للتجارة",
                "CustomerCode" => "00050",
                "Ser" => "538"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة موسوعة الخليج للمقاولات والتكييف",
                "CustomerCode" => "00005",
                "Ser" => "539"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة بلور للتبريد والتكييف",
                "CustomerCode" => "00501",
                "Ser" => "540"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "موسسه عبدالله عبدالعزيز عبدالله المقبل",
                "CustomerCode" => "00505",
                "Ser" => "541"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الراجحي للمقاولات",
                "CustomerCode" => "00449",
                "Ser" => "542"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة ميرنا شحاتة عثمان للمقاولات",
                "CustomerCode" => "00456",
                "Ser" => "543"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الفنار",
                "CustomerCode" => "00458",
                "Ser" => "544"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة عصور التقنية للتجارة و المقاولات",
                "CustomerCode" => "00046",
                "Ser" => "545"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة جرير للتسويق",
                "CustomerCode" => "00461",
                "Ser" => "546"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة منارة السلامة للمقاولات",
                "CustomerCode" => "00467",
                "Ser" => "547"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة بيت الخبرات للتشغيل والصيانة المحدودة",
                "CustomerCode" => "00468",
                "Ser" => "548"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة ساف العربية للتجارة والمقاولات",
                "CustomerCode" => "00470",
                "Ser" => "549"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة محمد توفيق عطاري للمقاولات ( ماتكون ]",
                "CustomerCode" => "00047",
                "Ser" => "550"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الخليج المتطور للاستثمار",
                "CustomerCode" => "00420",
                "Ser" => "551"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة العمر للمقاولات",
                "CustomerCode" => "00042",
                "Ser" => "552"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة التبريد المثالي للمقاولات",
                "CustomerCode" => "00428",
                "Ser" => "553"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة أكون الدوليه",
                "CustomerCode" => "00043",
                "Ser" => "554"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ماس الهندسة والانشاء المحدودة",
                "CustomerCode" => "00436",
                "Ser" => "555"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة عبد الله منيس الشهراني للتكييف",
                "CustomerCode" => "00044",
                "Ser" => "556"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة مدن الجليد للتكييف والتبريد (شركة شخص واحد]",
                "CustomerCode" => "00441",
                "Ser" => "557"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الهدى المطورة للتجارة",
                "CustomerCode" => "00393",
                "Ser" => "558"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة مصنع صناع مخارج الهواء  للتصنيع",
                "CustomerCode" => "00397",
                "Ser" => "559"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة افق للتكييف والتبريد",
                "CustomerCode" => "00039",
                "Ser" => "560"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سعودي جيو",
                "CustomerCode" => "00350",
                "Ser" => "561"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة العناية الوحيدة للمقاولات",
                "CustomerCode" => "00035",
                "Ser" => "562"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة قمم الجليد للتكييف",
                "CustomerCode" => "00036",
                "Ser" => "563"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة شروق الفتح",
                "CustomerCode" => "00377",
                "Ser" => "564"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة تروك للمقاولات",
                "CustomerCode" => "00038",
                "Ser" => "565"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "اساور الشرق للتكييف",
                "CustomerCode" => "00327",
                "Ser" => "566"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة العواد للتكييف",
                "CustomerCode" => "00033",
                "Ser" => "567"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة الوطن للتكييف",
                "CustomerCode" => "00335",
                "Ser" => "568"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة آماق للمقاولات",
                "CustomerCode" => "00034",
                "Ser" => "569"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة هالة الرياض",
                "CustomerCode" => "00037",
                "Ser" => "570"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة بيت الطاقة",
                "CustomerCode" => "00372",
                "Ser" => "571"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة أسلا العقارية",
                "CustomerCode" => "00317",
                "Ser" => "572"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مكتب الركن للاستشارات الهندسية",
                "CustomerCode" => "00318",
                "Ser" => "573"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "الشركة القومية للانشاءات و المقاولات",
                "CustomerCode" => "00032",
                "Ser" => "574"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة صيانة التكييف والتبريد المحدودة",
                "CustomerCode" => "00321",
                "Ser" => "575"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "الشركة السعودية لانتاج مجارى الهواء",
                "CustomerCode" => "00264",
                "Ser" => "576"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة البواني المحدودة",
                "CustomerCode" => "00025",
                "Ser" => "577"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة دور المباني للمقاولات",
                "CustomerCode" => "00172",
                "Ser" => "578"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مجموعة  عبد الله  عبد المحسن التميمي",
                "CustomerCode" => "00178",
                "Ser" => "579"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وهج العالمية للمقاولات العامة شركة شخص واحد",
                "CustomerCode" => "00295",
                "Ser" => "580"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة ثامر كاسب الفهيقي للمقاولات  المعمارية",
                "CustomerCode" => "00296",
                "Ser" => "581"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة شرق الدلتا السعودية المحدودة",
                "CustomerCode" => "00297",
                "Ser" => "582"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "السعودية للصناعات الدوائيه",
                "CustomerCode" => "00030",
                "Ser" => "583"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مجموعة مزايا الانشاء",
                "CustomerCode" => "00303",
                "Ser" => "584"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة عبد الرحمن محمد الملحق للمقاولات شركة شخص واح",
                "CustomerCode" => "00309",
                "Ser" => "585"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة كيان أفنان للمقاولات",
                "CustomerCode" => "00310",
                "Ser" => "586"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة صروح الكيان",
                "CustomerCode" => "00026",
                "Ser" => "587"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "عبد العزيز عبد الله النملة",
                "CustomerCode" => "00027",
                "Ser" => "588"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة الاتقان الحديثة",
                "CustomerCode" => "00275",
                "Ser" => "589"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الهوية التاسعة للمقاولات",
                "CustomerCode" => "00279",
                "Ser" => "590"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الراشد للتجارة و المقاولات",
                "CustomerCode" => "00028",
                "Ser" => "591"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة عمر الفهيد",
                "CustomerCode" => "00281",
                "Ser" => "592"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة تاب السعودية",
                "CustomerCode" => "00284",
                "Ser" => "593"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مصنع  بحر الافنان للاعمال المعدنية",
                "CustomerCode" => "00287",
                "Ser" => "594"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة كرم الاعمار الكترومكانيك",
                "CustomerCode" => "00029",
                "Ser" => "595"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة العدال للتجارة والمقاولات (شركة شخص واحد]",
                "CustomerCode" => "00292",
                "Ser" => "596"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة الاشغال المتخصصه للمقاولات",
                "CustomerCode" => "00023",
                "Ser" => "597"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "البيئة الخضراء للمقاولات",
                "CustomerCode" => "00231",
                "Ser" => "598"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "عبدالرحمن محمد المحيميد لتجارة الجملة والتجزئة",
                "CustomerCode" => "00232",
                "Ser" => "599"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة المعاصرة الحديثة للمقاولات العامة",
                "CustomerCode" => "00239",
                "Ser" => "600"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة ثيرمال  اير الصناعة العربية",
                "CustomerCode" => "00240",
                "Ser" => "601"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "المهندس / صالح محمد صالح",
                "CustomerCode" => "00024",
                "Ser" => "602"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة المقاييس المتحدة",
                "CustomerCode" => "1294",
                "Ser" => "603"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة الجميرة اتقان للمقاولات",
                "CustomerCode" => "1295",
                "Ser" => "604"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة الاعمار المهاري للمقاولات",
                "CustomerCode" => "1296",
                "Ser" => "605"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "عبدالله العماري",
                "CustomerCode" => "1310",
                "Ser" => "606"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة ركن المعادن",
                "CustomerCode" => "00132",
                "Ser" => "607"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة روائع للتكييف",
                "CustomerCode" => "00196",
                "Ser" => "608"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة مواهب الاخوان للمقاولات",
                "CustomerCode" => "00198",
                "Ser" => "609"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "أمان العاصمة للسلامة",
                "CustomerCode" => "00207",
                "Ser" => "610"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة الشعاع للتكييف",
                "CustomerCode" => "00021",
                "Ser" => "611"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة مصنع الخليج لفلاتر التكييف ( قافكو ]",
                "CustomerCode" => "00022",
                "Ser" => "612"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "النعيم للتكييف",
                "CustomerCode" => "00225",
                "Ser" => "613"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة الجياد المرنة للمقاولات",
                "CustomerCode" => "00166",
                "Ser" => "614"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة ايه بي في روك جروب المحدودة",
                "CustomerCode" => "00167",
                "Ser" => "615"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "النطاقات المتعددة للمقاولات",
                "CustomerCode" => "00169",
                "Ser" => "616"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة هدى محمد خلف الشمري للمقاولات",
                "CustomerCode" => "01004",
                "Ser" => "617"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة عفرينا للإنشاء والتطوير العمراني",
                "CustomerCode" => "01005",
                "Ser" => "618"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة قوة الطاقة المبتكرة للمقاولات",
                "CustomerCode" => "01006",
                "Ser" => "619"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة رؤية المملكة للمقاولات",
                "CustomerCode" => "01007",
                "Ser" => "620"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة التخطيط والاحتراف للمقاولات",
                "CustomerCode" => "01008",
                "Ser" => "621"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة تشاينا بتروليم انجنيرينج أند كونستركشن كوربور",
                "CustomerCode" => "01009",
                "Ser" => "622"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة قطب الجليد للتكييف",
                "CustomerCode" => "00107",
                "Ser" => "623"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة القصر للتكييف",
                "CustomerCode" => "00108",
                "Ser" => "624"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة المباني للمقاولات",
                "CustomerCode" => "00109",
                "Ser" => "625"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة الطاقة البيضاء ( إبراد النهار ]",
                "CustomerCode" => "00110",
                "Ser" => "626"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة ساحل التمييز للمقاولات",
                "CustomerCode" => "00133",
                "Ser" => "627"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة نهج التقدم للمقاولات",
                "CustomerCode" => "00136",
                "Ser" => "628"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة المروج للأعمال الكهربائية و الميكانيكية",
                "CustomerCode" => "00137",
                "Ser" => "629"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة آبسل بول للمقاولات المحدودة",
                "CustomerCode" => "00138",
                "Ser" => "630"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة نيفال لاعمال التكييف (الدمام ]",
                "CustomerCode" => "00139",
                "Ser" => "631"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة إتقان لأعمال الأليكترومكانيك",
                "CustomerCode" => "00140",
                "Ser" => "632"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة التميمي",
                "CustomerCode" => "00141",
                "Ser" => "633"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة محمد السوادي للمقاولات",
                "CustomerCode" => "00145",
                "Ser" => "634"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة عبد المجيد عائض بن بعيجان العصيمى للمقاولات",
                "CustomerCode" => "01026",
                "Ser" => "635"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة فانسي للذهب والمجوهرات",
                "CustomerCode" => "01027",
                "Ser" => "636"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سعودي إركون",
                "CustomerCode" => "00103",
                "Ser" => "637"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة الهواء الجاف للتكييف",
                "CustomerCode" => "00104",
                "Ser" => "638"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مؤسسة تحفة المدائن الكترومكانيك",
                "CustomerCode" => "00105",
                "Ser" => "639"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "نمارق الشرق للتكييف والتبريد",
                "CustomerCode" => "00001",
                "Ser" => "640"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "مؤسسة سمو بغداد للمقاولات العامة",
                "CustomerCode" => "01001",
                "Ser" => "641"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة فال الجنوب للصناعة",
                "CustomerCode" => "01023",
                "Ser" => "642"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة صالح وعبد العزيز اباحسين المحدودة",
                "CustomerCode" => "01024",
                "Ser" => "643"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة صخر الأساس المحدودة",
                "CustomerCode" => "01014",
                "Ser" => "644"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة برودة الثلج للمقاولات",
                "CustomerCode" => "01015",
                "Ser" => "645"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة سلمان بن سعود وشريكه للتجارة والمقاولات العام",
                "CustomerCode" => "01016",
                "Ser" => "646"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة توكيلات العالم العربي للتجارة والمقاولات",
                "CustomerCode" => "01019",
                "Ser" => "647"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة بيت العقيلية للتجارة",
                "CustomerCode" => "01020",
                "Ser" => "648"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سامكون",
                "CustomerCode" => "00102",
                "Ser" => "649"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة درر تمام للتجارة والمقاولات",
                "CustomerCode" => "01021",
                "Ser" => "650"
            ],
            [
                "EmployeeCode" => "117",
                "CustomerName" => "مؤسسة الخبراء الشرقيون",
                "CustomerCode" => "00111",
                "Ser" => "651"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة واحة المنصورية للمقاولات",
                "CustomerCode" => "00112",
                "Ser" => "652"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "MADI M. AL- HAJRI & PATNERS CO.",
                "CustomerCode" => "00113",
                "Ser" => "653"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "ACC A/C CONSULTANT.",
                "CustomerCode" => "00114",
                "Ser" => "654"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة التخصص للتكييف",
                "CustomerCode" => "00101",
                "Ser" => "655"
            ],
            [
                "EmployeeCode" => "125",
                "CustomerName" => "شركة ريبا نجد للمقاولات",
                "CustomerCode" => "01012",
                "Ser" => "656"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة شبكة الامداد للمقاولات",
                "CustomerCode" => "01158",
                "Ser" => "657"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صدي البنيان للتجارة والمقاولات",
                "CustomerCode" => "01159",
                "Ser" => "658"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "مؤسسة معادن الخير للتجارة",
                "CustomerCode" => "00116",
                "Ser" => "659"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة اساسات تبوك للمقاولات شركة شخص واحد",
                "CustomerCode" => "01161",
                "Ser" => "660"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة مركز الميرة للتجارة المحدودة",
                "CustomerCode" => "01163",
                "Ser" => "661"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "مؤسسة امان العالمي للمقاولات العامة",
                "CustomerCode" => "01164",
                "Ser" => "662"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مضاف للتجارة والمقاولات",
                "CustomerCode" => "1165",
                "Ser" => "663"
            ],
            [
                "EmployeeCode" => "666",
                "CustomerName" => "مصنع فتحات الخليج للصناعة",
                "CustomerCode" => "1166",
                "Ser" => "664"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة ركن الغدير للمقاولات",
                "CustomerCode" => "1167",
                "Ser" => "665"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الامثل الانشائي للمقاولات العامة",
                "CustomerCode" => "1168",
                "Ser" => "666"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة الامتياز والابتكار للمقاولات",
                "CustomerCode" => "1169",
                "Ser" => "667"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الرياض الخضراء المحدودة",
                "CustomerCode" => "1170",
                "Ser" => "668"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مكتب تماره للاستشارات الهندسية",
                "CustomerCode" => "1171",
                "Ser" => "669"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "شركة الحقيل للمقاولات المحدودة",
                "CustomerCode" => "1173",
                "Ser" => "670"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة طور الخليج للمقاولات العامة",
                "CustomerCode" => "1174",
                "Ser" => "671"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة علي حمزة علي البهيدل للمقاولات",
                "CustomerCode" => "1175",
                "Ser" => "672"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة الاداء المتوازن للمقاولات",
                "CustomerCode" => "1176",
                "Ser" => "673"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مطوري التهوية المحدودة",
                "CustomerCode" => "1177",
                "Ser" => "674"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة اجادا للمقاولات العامة",
                "CustomerCode" => "1178",
                "Ser" => "675"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة واك الكيف لتقديم المشروبات",
                "CustomerCode" => "1179",
                "Ser" => "676"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "الشركة الصينية لإنشاء السكك الحديدية المحدودة - ال",
                "CustomerCode" => "00118",
                "Ser" => "677"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة امنه محمد الحسين للمقاولات",
                "CustomerCode" => "1180",
                "Ser" => "678"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة حبة نبات للمقاولات العامة",
                "CustomerCode" => "1181",
                "Ser" => "679"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بنيان الوطن للمقاولات",
                "CustomerCode" => "1183",
                "Ser" => "680"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وهج الماس للتجارة والتسويق المحدودة",
                "CustomerCode" => "1184",
                "Ser" => "681"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة موسي فهد بن غيث للمقاولات",
                "CustomerCode" => "1185",
                "Ser" => "682"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة بين التلال الدولية لاعمال التكييف",
                "CustomerCode" => "1186",
                "Ser" => "683"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة جوري مريبد بن جزاع العنزي للتجارة",
                "CustomerCode" => "1187",
                "Ser" => "684"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة رام الجزيرة للمقاولات العامة",
                "CustomerCode" => "1188",
                "Ser" => "685"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة قيد الاوابد للمقاولات",
                "CustomerCode" => "1189",
                "Ser" => "686"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بشري الشمال للمقاولات",
                "CustomerCode" => "1193",
                "Ser" => "687"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الفهد للتجارة والصناعة والمقاولات مساهمة مقفل",
                "CustomerCode" => "1194",
                "Ser" => "688"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة علاء توفيق التمران للتجارة",
                "CustomerCode" => "1195",
                "Ser" => "689"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مصدر التقنية الحديثة المحدودة",
                "CustomerCode" => "1197",
                "Ser" => "690"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة عالم المستقبل لاعمال التكييف",
                "CustomerCode" => "1198",
                "Ser" => "691"
            ],
            [
                "EmployeeCode" => "123",
                "CustomerName" => "شركة ايه سي اي اركيرودون جي في المحدزدة",
                "CustomerCode" => "1200",
                "Ser" => "692"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة مجموعة اعمالنا للمقاولات",
                "CustomerCode" => "1201",
                "Ser" => "693"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الجبل العربية للمقاولات المحدودة",
                "CustomerCode" => "1202",
                "Ser" => "694"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اوزون التكييف للتجارة",
                "CustomerCode" => "1203",
                "Ser" => "695"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مشراف المدائن للمقاولات",
                "CustomerCode" => "1204",
                "Ser" => "696"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "مؤسسة شافي بن محمد البوعينين للمقاولات",
                "CustomerCode" => "1205",
                "Ser" => "697"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة سماح للمقاولات المحدودة",
                "CustomerCode" => "1206",
                "Ser" => "698"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة جال التنمية",
                "CustomerCode" => "1207",
                "Ser" => "699"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة سليمان بن صالح المهيلب وابنائه -مساهمة مقفلة",
                "CustomerCode" => "1208",
                "Ser" => "700"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة دليل الانذار لمعدات السلامة",
                "CustomerCode" => "1190",
                "Ser" => "701"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة الارض العالية للمقاولات",
                "CustomerCode" => "1191",
                "Ser" => "702"
            ],
            [
                "EmployeeCode" => "113",
                "CustomerName" => "سارة الدولية للأعمال الكهروميكانيكية",
                "CustomerCode" => "00121",
                "Ser" => "703"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة منصور فرج مفرج الصبحي",
                "CustomerCode" => "1211",
                "Ser" => "704"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صدف العربية للمقاولات",
                "CustomerCode" => "1212",
                "Ser" => "705"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة رادس للتجارة",
                "CustomerCode" => "1213",
                "Ser" => "706"
            ],
            [
                "EmployeeCode" => "123",
                "CustomerName" => "شركة مسك التخصصية للمقاولات",
                "CustomerCode" => "1214",
                "Ser" => "707"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة ناهل للمقاولات ( شركة شخص واحد ]",
                "CustomerCode" => "1215",
                "Ser" => "708"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة مجموعة زيد الحسين واخوانه للمقاولات",
                "CustomerCode" => "1217",
                "Ser" => "709"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة التحسين العالمية المحدودة",
                "CustomerCode" => "1218",
                "Ser" => "710"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة الواجهه العالميه للمقاولات",
                "CustomerCode" => "1219",
                "Ser" => "711"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة دره رم للمقاولات",
                "CustomerCode" => "00122",
                "Ser" => "712"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة جبل نيس للمقاولات",
                "CustomerCode" => "1221",
                "Ser" => "713"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نجود صالح سالم الصيعري التجارية",
                "CustomerCode" => "1222",
                "Ser" => "714"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة تحالف الوطنية للمقاولات",
                "CustomerCode" => "1223",
                "Ser" => "715"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بست ون للتجارة",
                "CustomerCode" => "1224",
                "Ser" => "716"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة بشائر البناء للمقاولات",
                "CustomerCode" => "00123",
                "Ser" => "717"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة تلال الرون للمقاولات",
                "CustomerCode" => "1230",
                "Ser" => "718"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة احتراف التنفيذ للمقاولات العامة",
                "CustomerCode" => "1231",
                "Ser" => "719"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة شعاع الرياض للمقاولات",
                "CustomerCode" => "1232",
                "Ser" => "720"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "الشؤون الصحية بالحرس الوطني",
                "CustomerCode" => "1233",
                "Ser" => "721"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة سلام المتحدة للمقاولات العامة",
                "CustomerCode" => "1234",
                "Ser" => "722"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "الشركة الوطنية للأعمال المحدودة",
                "CustomerCode" => "1235",
                "Ser" => "723"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة وتر البناء لادوات السلامة",
                "CustomerCode" => "1236",
                "Ser" => "724"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الراشد للتقنية والطاقة",
                "CustomerCode" => "1237",
                "Ser" => "725"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة فضاء التشييد للمقاولات",
                "CustomerCode" => "1226",
                "Ser" => "726"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة ديوان بناء العمار للمقاولات",
                "CustomerCode" => "1227",
                "Ser" => "727"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة صالح عبدالعزيز الراجحي وشركاه المحدوده",
                "CustomerCode" => "1228",
                "Ser" => "728"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة الشرقاوي للمقاولات الكهربائية و الميكانيكية",
                "CustomerCode" => "00124",
                "Ser" => "729"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الزرقاء الوطنية للمقاولات",
                "CustomerCode" => "1240",
                "Ser" => "730"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة النجم الزاهر للتجارة",
                "CustomerCode" => "1241",
                "Ser" => "731"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة بيجه السعودية المحدودة",
                "CustomerCode" => "00125",
                "Ser" => "732"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة المجرة العالمية",
                "CustomerCode" => "1250",
                "Ser" => "733"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الدفع للتجارة والمقاولات",
                "CustomerCode" => "1251",
                "Ser" => "734"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة المشروعات المتحدة",
                "CustomerCode" => "1252",
                "Ser" => "735"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة اركان البناء الحديث للمقاولات",
                "CustomerCode" => "1253",
                "Ser" => "736"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الموئل للمقاولات المحدودة",
                "CustomerCode" => "1254",
                "Ser" => "737"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة عبدالعزيز علي العريفي للمقاولات شخص واحد",
                "CustomerCode" => "1255",
                "Ser" => "738"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة فواصل المدن للمقاولات",
                "CustomerCode" => "1256",
                "Ser" => "739"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "مؤسسة بروج جدة للمقاولات العامة",
                "CustomerCode" => "1257",
                "Ser" => "740"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة الانشاءات الحرجة للمقاولات",
                "CustomerCode" => "1245",
                "Ser" => "741"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة نجود الرياض للمقاولات",
                "CustomerCode" => "1246",
                "Ser" => "742"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة المشيد للتطوير الدولية المحدودة",
                "CustomerCode" => "1247",
                "Ser" => "743"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة أجزاء البناء للتجارة",
                "CustomerCode" => "1248",
                "Ser" => "744"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سعد بن علي الحميداني للتبريد والتكييف",
                "CustomerCode" => "1259",
                "Ser" => "745"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة كنانة للمقاولات المحدودة",
                "CustomerCode" => "00126",
                "Ser" => "746"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "مؤسسة عنوان الجودة للمقاولات العامة",
                "CustomerCode" => "1260",
                "Ser" => "747"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة فداء نعيم عبدالغني مطران للتجارة",
                "CustomerCode" => "1243",
                "Ser" => "748"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الممر المعقود للمقاولات العامة",
                "CustomerCode" => "1262",
                "Ser" => "749"
            ],
            [
                "EmployeeCode" => "444",
                "CustomerName" => "شركة الابتكار العالمية للتجارة والمقاولات",
                "CustomerCode" => "1265",
                "Ser" => "750"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة طريق الطاقة للمقاولات",
                "CustomerCode" => "1271",
                "Ser" => "751"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة التميز الخليجية للمقاولات",
                "CustomerCode" => "1272",
                "Ser" => "752"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الأعمال الفخمة للمقاولات شركة شخص واحد",
                "CustomerCode" => "1273",
                "Ser" => "753"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة بوابة البنيان للمقاولات",
                "CustomerCode" => "1274",
                "Ser" => "754"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة طيف الهندسه للتجاره",
                "CustomerCode" => "1275",
                "Ser" => "755"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة محمد مطر العتيبي للمقاولات",
                "CustomerCode" => "1276",
                "Ser" => "756"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة اتقان السعودية للمقاولات",
                "CustomerCode" => "1277",
                "Ser" => "757"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة فجر الجنوب للمقاولات",
                "CustomerCode" => "1278",
                "Ser" => "758"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "شركة الفوز الجديد للتبريد والتكييف",
                "CustomerCode" => "1279",
                "Ser" => "759"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة ميادين المعرفة للمقاولات",
                "CustomerCode" => "1281",
                "Ser" => "760"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة هاي تك انجينيرنغ كونتراكتنغ السعودية العربية",
                "CustomerCode" => "1282",
                "Ser" => "761"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة دار السمو للتجارة المحدودة",
                "CustomerCode" => "1283",
                "Ser" => "762"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "المهد العالي للتجارة",
                "CustomerCode" => "1284",
                "Ser" => "763"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "شركة مايل ستون المتكاملة للمقاولات",
                "CustomerCode" => "1285",
                "Ser" => "764"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة الأمام الأولي للمشاريع",
                "CustomerCode" => "1287",
                "Ser" => "765"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "مؤسسة محمد فهد رجاء الشمري للمقاولات",
                "CustomerCode" => "1288",
                "Ser" => "766"
            ],
            [
                "EmployeeCode" => "999",
                "CustomerName" => "مؤسسة بوابة ميرال للتجارة",
                "CustomerCode" => "1268",
                "Ser" => "767"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة مجموعة النخلات الثلاث للتجاره المحدوده",
                "CustomerCode" => "1269",
                "Ser" => "768"
            ],
            [
                "EmployeeCode" => "222",
                "CustomerName" => "شركة سبيكون السعودية",
                "CustomerCode" => "00127",
                "Ser" => "769"
            ],
            [
                "EmployeeCode" => "120",
                "CustomerName" => "شركة الرواد الفنية للصناعة شركة شخص واحد",
                "CustomerCode" => "1290",
                "Ser" => "770"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "شركة حلول الجزيرة للتكييف والتبريد",
                "CustomerCode" => "1291",
                "Ser" => "771"
            ],
            [
                "EmployeeCode" => "333",
                "CustomerName" => "شركة ابراهيم صالح ابراهيم الهبدان للمقاولات",
                "CustomerCode" => "1292",
                "Ser" => "772"
            ],
            [
                "EmployeeCode" => "118",
                "CustomerName" => "شركة الآفاق للمقاولات",
                "CustomerCode" => "01029",
                "Ser" => "773"
            ],
            [
                "EmployeeCode" => "112",
                "CustomerName" => "مؤسسة الواحة الفنية التجارية",
                "CustomerCode" => "00923",
                "Ser" => "774"
            ],
            [
                "EmployeeCode" => "555",
                "CustomerName" => "اتحاد أمواج لتكييف الهواء شركة ذات مسئولية محدودة",
                "CustomerCode" => "1319",
                "Ser" => "775"
            ]
        ];
        return collect($clients);
    }

    public static function getEmployeeClients(string $customerCode)
    {
        $clients = self::getAllClientsList();
        return $clients->filter(function ($client) use ($customerCode) {
            if ($client["EmployeeCode"] == $customerCode) {
                return $client;
            }
        });
    }

    public static function getCustomer(string $customerCode = null)
    {
        $clients = self::getAllClientsList();
        $customers =  $clients->filter(function ($client) use ($customerCode) {
            if ($client['CustomerCode'] == $customerCode) {
                return $client;
            }
        });

        $customer = $customers->first();

        if ($customer) {
            return $customer['CustomerCode'] . ". " . $customer['CustomerName'];
        }

        return $customerCode;
    }
}