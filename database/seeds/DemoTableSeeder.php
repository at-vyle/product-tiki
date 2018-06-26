<?php

use Illuminate\Database\Seeder;

class DemoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CATEGORIES
        // Categories parent

        factory('App\Models\Category', 1)->create([
            'name' => 'Smart Phone'
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Laptop'
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Food'
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Electronics'
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Tools'
        ]);

        // Categories 1

        factory('App\Models\Category', 1)->create([
            'name' => 'Iphone',
            'parent_id' => 1,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'SamSung',
            'parent_id' => 1,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Sony',
            'parent_id' => 1,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'BlackPerry',
            'parent_id' => 1,
            'level' => 1
        ]);

        //  Categories 2

        factory('App\Models\Category', 1)->create([
            'name' => 'Dell',
            'parent_id' => 2,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Asus',
            'parent_id' => 2,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Mac',
            'parent_id' => 2,
            'level' => 1
        ]);

        //  Categories 3

        factory('App\Models\Category', 1)->create([
            'name' => 'Aliment',
            'parent_id' => 3,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Drink',
            'parent_id' => 3,
            'level' => 1
        ]);

        // Categories 4

        factory('App\Models\Category', 1)->create([
            'name' => 'Headphones',
            'parent_id' => 4,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Machine',
            'parent_id' => 4,
            'level' => 1
        ]);

        // Categories 5

        factory('App\Models\Category', 1)->create([
            'name' => 'Kitchen',
            'parent_id' => 5,
            'level' => 1
        ]);
        factory('App\Models\Category', 1)->create([
            'name' => 'Home Decor',
            'parent_id' => 5,
            'level' => 1
        ]);

        // PRODUCTS
        // products Iphone

        $iphoneProducts = [
            [
                'name' => 'Iphone 6',
                'description' => 'The iPhone 6 ($199 and up from the Apple Store) is quite possibly the most popular product Apple currently sells. Equipped with a 4.7″ Retina HD display, the iPhone 6 has 1334×750 resolution at 326PPI, boasting increased color accuracy and a wider viewing angle than prior iPhones. Three capacities (16/64/128GB) and three colors (gold/silver/space gray) are available.',
            ],
            [
                'name' => 'Iphone 6s',
                'description' => 'The iPhone 6s ($299 and up from the Apple Store) is Apple’s flagship phone, and one of its most popular products, period. Equipped with a 5.5″ Retina HD display, the iPhone 6s boasts full 1080p HD resolution (1920 x 1080) at 401 PPI, the sharpest-looking screen on any Apple device. It’s also color-accurate, with a full sRGB color gamut and a wider viewing angle than prior screens. Three capacities (16/64/128GB) and three colors (gold/silver/space gray) are available.',
            ],
            [
                'name' => 'Iphone 6s plus',
                'description' => 'The iPhone 6s Plus ($299 and up from the Apple Store) is Apple’s flagship phone, and one of its most popular products, period. Equipped with a 5.5″ Retina HD display, the iPhone 6s Plus boasts full 1080p HD resolution (1920 x 1080) at 401 PPI, the sharpest-looking screen on any Apple device. It’s also color-accurate, with a full sRGB color gamut and a wider viewing angle than prior screens. Three capacities (16/64/128GB) and three colors (gold/silver/space gray) are available.',
            ],
            [
                'name' => 'Iphone 7',
                'description' => 'Apple revealed the iPhone 7 on 7th September 2016.

                There were few surprises. As expected, the phone was an iteration on the previous iPhone 6/6s, though with tidier antenna lines and camera bump. The only significant design change was two new colors, in the form of a high-gloss Jet Black and a matte black simply known as … Black.',
            ],
            [
                'name' => 'Iphone 7s',
                'description' => 'A new research note from Counterpoint shows that whilst Apple’s dominance in China is not as high as its peak, it is the only foreign smartphone brand that matters in the region. iPhone 7 Plus was the no.2 best selling handset across all of 2017, and the smaller iPhone 7 took fifth place (via CNBC).

                China’s propensity towards larger-screened phones is shown by the Plus’ popularity compared to the regular iPhone 7. Apple was the only foreign brand to feature in the top 10 phone models, with 5.2% total market share from both iPhone 7 models.',
            ],
            [
                'name' => 'Iphone 8',
                'description' => 'The iPhone 8 models bring some solid upgrades over the iPhone 7 and 7 Plus including a new processor, wireless charging, upgraded cameras, a new glass back, and more.

                Both the iPhone 8, 8 Plus, and X feature the A11 Bionic processor. The all new chip has four efficiency cores that are up to 70% faster than A10 Fusion and two performance cores that are up to 25% faster. The new models also have an Apple designed GPU that offers up to 30% better performance than the A10 chip.',
            ],
            [
                'name' => 'Iphone 8s',
                'description' => 'Apple has announced a brand new (PRODUCT)RED iPhone 8 and iPhone 8 Plus, available later this week. The product features a special red back design and a black bezel. For iPhone X, there is no new hardware per se; Apple is releasing a new (PRODUCT)RED leather folio case though.

                Apple says the new (PRODUCT)RED iPhone will be available to order from Tuesday, April 10. The product will be in stores this Friday.',
            ],
            [
                'name' => 'Iphone X',
                'description' => 'The iPhone X has a brand-new design and is the first iPhone to feature an OLED display. The iPhone X has a 5.8-inch screen with minimal bezels, giving it a physical size close to the iPhone 8, with a screen size larger than the iPhone 8 Plus.

                The iPhone X features glass on the front and back with a stainless steel body that seamlessly meet at the device’s curved edges. Other flagship features include the devices new 3D sensors that bring Face ID as a replacement to Touch ID and wireless charging support.',
            ],
        ];

        foreach ($iphoneProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 6,
                'description' => $products['description']
            ]);
        }

        $samsungProducts = [
            [
                'name' => 'Samsung J7 Pro',
                'description' => 'Within the $ 6 million range, the Galaxy J7 Pro is one of the most worthy phones, due to its stability when surfing the web, playing games; The sleek design of the S series drives itself as well as the battery life of up to 3600 mAh.
                The mid-range phone brings the sleek design of the S line
                Galaxy J7 Pro owns a new design, completely different from the previous J series, luxurious and more refined.',
            ],
            [
                'name' => 'Samsung J7 Prime',
                'description' => 'Galaxy J7 Prime deserves the top spot in the list of popular smartphones of young people when receiving positive reviews for design, long battery life and good quality camera.',
            ],
            [
                'name' => 'Samsung J7 Plus',
                'description' => 'Samsung Galaxy J7 + is a mid-range smartphone, but its equipped with a dual camera capable of capturing portraits with beautifully designed and powerful performance.
                High-end design
                Samsung Galaxy J7 + continues to be used monolithic designs from the metal as the luxury line, bringing the most luxurious as well as durable.',
            ],
            [
                'name' => 'Samsung Galaxy S9',
                'description' => 'Samsung Galaxy S9 officially launched with a series of improvements, high-end features such as camera change the aperture, super slow 960 fps, AR Emoji ... quickly bring fever technology village.
                Luxury design, luxury
                The Galaxy S9 still follows the same design philosophy as the Galaxy S8 with a solid metal frame and a soft, curved back. In particular, the chassis of the Galaxy S9 is finished with a metal grip that better grip hand, not glossy as the S8.',
            ],
            [
                'name' => 'Samsung Galaxy S9 Plus',
                'description' => 'Samsung Galaxy S9 Plus 128GB Hoang Kim, the leading smartphone in the world Android has launched with infinity screen, professional camera like camera and a series of high-end features attractive.',
            ],
        ];

        foreach ($samsungProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 7,
                'description' => $products['description']
            ]);
        }

        $sonyProducts = [
            [
                'name' => 'Sony Xperia X',
                'description' => 'Sony has introduced its new X Series in 2016 at MWC. The Xperia X is a mid-range smartphone with remarkable features.',
            ],
            [
                'name' => 'Sony Xperia XZ',
                'description' => 'Sony Xperia XZ with beautiful design, the same quality camera, more features.
                Luxurious design
                Improved than the traditional design of the Xperia series, the Sony Xperia XZ carries a new look - more beautiful, more luxurious.',
            ],
            [
                'name' => 'Sony Xperia L1',
                'description' => 'Sony Xperia L1 with a price that suits many users with beautiful design is not inferior to high-end products.
                Luxurious design
                Xperia L1 has a plastic shell, rounded edges while the top and bottom edges. Overall the design is quite slender and elegant, the back of the machine is made entirely of polycarbonate.',
            ],
            [
                'name' => 'Sony Xperia XA1',
                'description' => 'Xperia XA1 is an upgrade of the Xperia XA has been quite successful in our country, with a fairly similar design super Xperia XZ, better equipped configuration and better quality camera.',
            ],
            [
                'name' => 'Sony Xperia L2',
                'description' => 'Sony Xperia L2 is an upgraded version of the Xperia L1 with high battery capacity, large internal memory and convenient fingerprint security.
                Stylish design Sony
                The machine feels square and "fat" rather than as long as the Xperia L1.',
            ],
        ];

        foreach ($sonyProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 8,
                'description' => $products['description']
            ]);
        }

        $blackperyProducts = [
            [
                'name' => 'Blackberry KeyOne Silver',
                'description' => 'External design of BlackBerry KEYONE

                The size of the BlackBerry KEYONE is quite interesting when its 149.3 mm tall, 72.5 mm wide, 9.4 mm thick and looks quite like a TV control. The back is made of rubbery plastic and quite smooth when held, but it clings to fingerprints and if you have hand sweat, the use will not be very comfortable.',
            ],
            [
                'name' => 'Blackberry Keyone Black Edition',
                'description' => 'KeyOne Black Edition, a special edition of the BlackBerry KeyOne series, is extremely elegant when the entire machine is covered in black.


                Although launched in 2017, but the BlackBerry KeyOne still carry on the physical keyboard has become the legend of the BlackBerry. BlackBerry KeyOne Black Edition naturally also has a physical keyboard.',
            ],
            [
                'name' => 'Blackberry KeyOne Bronze',
                'description' => 'External design of BlackBerry KEYONE Bronze

                The difference between Keyone Broneze and its predecessor is the Ram 4G with 64GB of memory. The size of the BlackBerry KEYONE is quite interesting when its 149.3 mm tall, 72.5 mm wide, 9.4 mm thick and looks quite like a TV control. The back is made of rubbery plastic and quite smooth when held, but it clings to fingerprints and if you have hand sweat, the use will not be very comfortable.',
            ],
            [
                'name' => 'Blackberry Classic Used',
                'description' => 'Excluding the luxury Porsche Design, Classic is the BlackBerry has the best design today, just bright. On the Passport, the bezel and bezel are made of metal with dull colors. In Classic, its a shiny frame, just like the famous Bold 9000 and Bold 9900, familiar to the followers. of the "blackberry". Compared to the previous QWERTY keyboard QWERTY BB10 as Q10 and Q5, BlackBerry Classic also looks more luxurious, more attractive.',
            ],
        ];

        foreach ($blackperyProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 9,
                'description' => $products['description']
            ]);
        }

        $dellProducts = [
            [
                'name' => 'Laptop Dell Vostro 3578 i5',
                'description' => 'The Dell Vostro 3578 is part of the Dell 2018 product lineup, which is pretty well configured. The laptop also uses a discrete Radeon graphics card suitable for graphics or gaming quite well.
                Design
                Still retains the familiar design of the Vostro from Dell with sturdy plastic case. Rigid body makes you feel secure. The black cover makes the overall design of the handset beautiful and powerful.',
            ],
            [
                'name' => 'Laptop Dell Inspiron 5570 i5',
                'description' => 'Dell Inspiron 5570 is one of the first laptops this year to be equipped with Dells new Intel KabyLake Refresh processor lineup in terms of performance compared to previous generations.
                Sophisticated design, class
                Overall, the Dell Inspiron 5570 is refined from plastic but looks pretty much like a luxury metal case. The machine is only 22.7 mm thin and weighs 2.3 kg. It is not too difficult to carry the machine.',
            ],
            [
                'name' => 'Laptop Dell Vostro 3578 i7',
                'description' => 'The Dell Vostro 3578 is Dells flagship product in 2018 with ultra-high performance, including the eighth-generation i7 8550U processor with outstanding performance, discrete Radeon 520 video card and 8 GB of RAM. With powerful configurations, the machine can run applications for work, learning, graphics processing and gaming at a relatively smooth mid-range configuration.
                Design
                Still retains the familiar design of the Vostro laptop with a solid body with a strong plastic and black. The large heat sink also helps keep the unit cool for long periods, without overheating when running heavy applications.',
            ],
            [
                'name' => 'Laptop Dell Inspiron 3467 i3',
                'description' => 'The Dell Inspiron 3467 features a 7-core Core i3 processor that delivers superior performance over previous generations, integrates with 4 GB of RAM and can support up to 8 GB of upgrades for the operator. Smooth the different needs.
                What games can be played?
                It does not support discrete graphics, but with the support Intel HD Graphics 620 card with HDD HDD up to 1TB to store more data and games.',
            ],
            [
                'name' => 'Laptop Dell Vostro 3468 i3',
                'description' => 'Dell Vostro 3468 i3 6006U is a well-priced product, equipped with Intel Core i3 processor for stable performance, HDD storage up to 500 GB.
                Traditional design
                The Dell Vostro 3468 is 23.4mm thin and weighs 1.95 kg, so its easy to carry around in many places, so convenient and trendy today.',
            ],
        ];

        foreach ($dellProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 10,
                'description' => $products['description']
            ]);
        }

        $asusProducts = [
            [
                'name' => 'Laptop Asus GL503GE i7',
                'description' => 'The Asus GL503GE is a gaming laptop designed specifically for the gamer, with a strong design trajectory, ultra smooth gaming performance, and ultra-high performance 8-bit gaming. Meet all the needs of gamers.
                Design
                Delivers the ultra-powerful design of a gaming laptop for gamers with crisp metallic scratches. The armrest has a unique 3D design and feels comfortable to hand, while increasing the power of the machine. Despite its high profile and high profile, it weighs just 2.5kg and is 2.3cm thin, making it easy to carry around when traveling. Suitable for many different needs.',
            ],
            [
                'name' => 'Laptop Asus S510UA i5',
                'description' => 'Asus S510UA i5 laptop is a great upgrade to Intels latest 8-series processor for outstanding performance, meeting the needs of everyday work, learning and entertainment.

                Difference comes from the configuration
                The machine uses Intel Core i5 Kabylake Refresh, 4 GB DDR4 RAM for gaming and graphics applications. 1 TB hard drive capacity for data storage.',
            ],
            [
                'name' => 'Laptop Asus S510UQ i5',
                'description' => 'Asus S510UQ i5 8250U thuộc phân khúc laptop mỏng nhẹ - thời trang với thiết kế kết hợp chất liệu kim loại, kiểu dáng bắt mắt. Máy còn trang bị cấu hình khá mạnh có thể sử dụng được các phần mềm về đồ họa hoặc chơi game ở mức độ cơ bản.
                Thiết kế hiện đại, cao cấp
                Asus S510UQ i5 8250U có thiết kế nắp lưng bằng kim loại thể hiện sự sang trọng cùng với một kiểu dáng gọn gàng, tinh tế. Máy mỏng chỉ 17.9 mm và có trọng lượng 1.5 kg nên rất dễ dàng di chuyển mọi lúc, mọi nơi để sử dụng.',
            ],
            [
                'name' => 'Laptop Asus X510UQ i7',
                'description' => 'Continuing to upgrade the model from the "Slim Fashion - Fashion" combines the "Graphics - Technique" Asus X510UQ i5 8250U, the Asus X510UQ i7 8550U model brings a better choice for users.
                Old bottle design - new wine
                The looks Asus X510UQ i7 is no different than the brother Asus X510UQ i5, also has a simple design, not too angular but bring a very luxurious beauty. It weighs just 1.5 kg and is 19.4 mm thin and is easy to carry around.',
            ],
            [
                'name' => 'Laptop Asus UX430UA i5',
                'description' => 'The Asus UX430UA is a computer model that combines slimness - fashion and a powerful configuration. This is the perfect choice for many users needs.

                Luxury design - class

                With its eye-catching looks, the Asus UX430UA features a slim 15.9 mm thin 1.3-inch Ultrabook that has a very elegant look. Suitable for those who are moving often easy to carry to use anytime, anywhere.',
            ],
        ];

        foreach ($asusProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 11,
                'description' => $products['description']
            ]);
        }

        $macProducts = [
            [
                'name' => 'Laptop Apple Macbook Air MQD32SA/A i5',
                'description' => 'Macbook Air MQD32SA / A i5 5350U with unibody aluminum shell design is very beautiful, sure and luxury. The MacBook Air is a lightweight, ultra-slim laptop with long lasting performance that is ideal for both work and play.
                Ultra-thin and lightweight design
                With the design of the MacBook Air, this version is only 1.7 cm thin and weighs 1.35 kg, very convenient and easy to carry with you.',
            ],
            [
                'name' => 'Laptop Apple Macbook Air MQD42SA/A i5',
                'description' => 'Macbook Air MQD42SA / A i5 5350U with unibody aluminum shell design is very beautiful, sure and luxury. Ultra-thin and ultra-light, smooth performance, long battery life, good for both work and play.
                Ultra-thin and lightweight design
                With the design of the MacBook Air, this version is only 1.7 cm thin and weighs 1.35 kg, very convenient and easy to carry with you. Logo apple apple creativity created distinct distinctive.',
            ],
            [
                'name' => 'Laptop Apple Macbook Pro MPXR2SA/A i5',
                'description' => 'The Apple MacBook Pro MPXR2SA / A i5 is a high end product line with solid metal design, the 7th generation i5 chip and 128GB SSDs for durability and robustness.
                Unibody featured design from Apple
                The Apple MacBook Pro MPXR2SA / A i5 is equipped with a solid, solid aluminum Unibody shell. The thin, lightweight and ultra-compact design is just 1.49 cm, weighing 1.37 kg and is very comfortable to carry.',
            ],
            [
                'name' => 'Laptop Apple Macbook 12" MNYK2SA/A Core M',
                'description' => 'Apple Macbook 12 "MNYK2SA / A (2017) is a device that will suit people who do office work, does not require a device that is too powerful but compact, easy to move the same time using the battery. impressive.
                High-end design
                Apple 12-inch MacBook MNYK2SA brings in an attractive appearance with solid monolithic metal material',
            ],
            [
                'name' => 'Laptop Apple Macbook Pro MPXT2SA/A i5',
                'description' => 'Apple MacBook Pro The MPXT2SA / A i5 7360U is a classy, ​​chic, solid metal design with the 7th generation i5 chip and SSDs offering a number of usable features. Suitable for users who need a laptop for graphics, engineering or entertainment, learning.
                Unibody featured design from Apple
                The MacBook Pro MPXT2SA / A i5 7360U is equipped with a solid, solid aluminum Unibody shell. Thin, lightweight design, only 1.49 cm thin and weight of 1.37 kg very convenient to move.',
            ],
        ];

        foreach ($macProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 12,
                'description' => $products['description']
            ]);
        }

        $alimentProducts = [
            [
                'name' => 'Deer Dry Deer Skincare Conditioner Neza (50g)',
                'description' => 'Dehydrated Deer Neuro Dehydrated Food (50g) "This product is not a medicine and does not have the effect of replacing medication."

                Deer Neuro Dehydrated Neza (50g) - Deer velvet has long been regarded as a valuable remedy, used more than 2000 years in traditional medicine in the world. Deer stew is fully effective in the care and improvement of human health. Nhung is from New Zealand with the best quality in the world. Fresh deer velvet is treated with "Sublimation Drying" technology to ensure and retain the precious essence.',
            ],
            [
                'name' => 'Ginseng Nutrition Honey Honey Shea Box 100g / 14 Bags',
                'description' => 'Food Function Ginger Honey Honey Bee Box 100g / 14 Bags - Ginger is commonly used as a remedy cough, cold, keep warm body when it is cold. In the wild, all parts of the ginger are used, the ginger is made of jam, the old ginger is refilled for medical treatment, dry ginger powder after squeezing is combined with fresh fruit to make jam roof.

                Reduce stomach discomfort
                Support for treatment of food poisoning, dysentery
                Prevention of nausea and vomiting
                Weight loss
                Prevent and fight cancer
                Improves digestion
                Relieve dysmenorrhea
                Cardiovascular problems
                Respiratory disorders
                Malaria
                Reduce stress',
            ],
            [
                'name' => 'Sardine Fish Oil EPA CoQ10 (300 Tablets) - AOZA_1',
                'description' => 'Health Food Support Aoza Fish Oil DHA EPA CoQ10 (300 Tablets) - AOZA_1 contains 100% natural fish oil, without heat, no preservatives to keep fish oil Palmitoleic Acid, Vitamin A, Vitamin E, Linoleic Acid, Beta Arotenoic, Linoleic, DPA and Vitamin D and most importantly DHA, EPA, CoQ10. The use of these three precious ingredients allows the AOZA product to be one of the most desirable products for consumers to choose from.',
            ],
        ];

        foreach ($alimentProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 13,
                'description' => $products['description']
            ]);
        }

        $drinkProducts = [
            [
                'name' => 'Tiger Beer (330ml / can)',
                'description' => 'Celebrate a great brand - its Tiger
                Tiger beer is naturally fermented from premium hops and barley imported from Europe to create a beer with excellent taste and quality. Tiger beer will bring you an unforgettable experience, for fun more fun.
                Advanced brewing technology
                Tiger beer is naturally fermented from premium hops and barley imported from Europe, providing excellent taste and quality, satisfying the taste of beer in more than 60 countries around the world',
            ],
            [
                'name' => 'Lipton Ice Tea Lemon Tea (224g / box)',
                'description' => 'Combo 2 Box of Lipton Ice Tea Lemon Tea (224g / Box) - Gift Boxes & Gifts Gift Baskets with delicious tea with a wonderful combination of black tea essence and natural lemon to bring the senses. excitement of surprise.
                It is a drink that ensures the quality of food safety and hygiene, and saves money, the box contains many small packages, convenient for each preparation.
                Suitable for cold drink, help the spirit of relaxation, sober, taste suitable for Vietnamese, can also be used as gifts to colleagues, relatives.',
            ],
            [
                'name' => 'Yeos Dew (6 Cans x 300ml)',
                'description' => 'Yeos Flavor (6 Cans x 300ml) is produced by modern process, ensuring strict hygiene and food safety to make products taste good, cool and nutritious.
                Heat the body, cool the liver, diuretic.
                Provides water, fiber and vitamins essential for the body, giving you a perfect body and skin.
                Products are designed cans convenient, easy to carry when traveling, picnic.
                Ease of use and storage.',
            ],
        ];

        foreach ($drinkProducts as $products) {
            factory('App\Models\Product', 1)->create([
                'name' => $products['name'],
                'category_id' => 14,
                'description' => $products['description']
            ]);
        }
    }
}
