<?php
return [
    'navbar' => [
        'home' => 'Home',
        'about' => 'About',
        'blog' => 'Blog',
        'rent' => 'Rent',
        'contact' => 'Contact'
    ],

    'sections' => [
        'components' => [
            'feedback_section' => [
                'badge' => 'Feedback',
                'title' => 'Customer Reviews',
            ],
            'any_questions_section' => [
                'title' => 'We Are Ready To Help You',
                'badge' => 'Any Questions?',
                'paragraph' => 'Have questions about renting a car? Our team is always ready...',
                'dropdown' => [
                    [
                        'title' => 'What are the requirements to rent a car?',
                        'description' => 'You need to have a valid driver’s license and an active credit card.'
                    ],
                    [
                        'title' => 'Can I rent a car without a credit card?',
                        'description' => 'Most rental companies require a credit card, but some may accept a debit card under certain conditions.'
                    ],
                    [
                        'title' => 'Can I use the rental car for intercity travel?',
                        'description' => 'Yes, you can use the rental car for intercity travel according to the provider’s policy.'
                    ],
                    [
                        'title' => 'What is the minimum age to rent a car?',
                        'description' => 'The minimum age to rent a car is usually 21 years, depending on the rental company’s policy.'
                    ],
                    [
                        'title' => 'Is insurance included in the rental price?',
                        'description' => 'Some packages include basic insurance. You may also purchase additional coverage for an extra fee.'
                    ],
                    [
                        'title' => 'What should I do if the car breaks down on the road?',
                        'description' => 'Contact the rental provider’s emergency service immediately. The number is usually available inside the vehicle or on the rental contract.'
                    ],
                ],
            ],
            'footer' => [
                'title_footer' => [
                    'navigation' => 'Navigation',
                    'quicklinks' => 'Quicklinks',
                    'contact_with_us' => 'Contact With Us',
                    'subscribe' => 'Subscribe',
                ],
                'privacy_policy' => 'Privacy Policy',
                'terms_and_conditions' => 'Terms and Conditions',
                'refund_policy' => 'Refund Policy',
                'description' => 'Car rental with a fast process, the best prices, and no hassle. Choose your favorite car now!',
                'description_subs' => 'Subscribe to our mailing list for the latest updates!'
            ],
        ],
        'home_page' => [
            'hero_section' => [
                'badge' => 'Start With Us',
                'title' => [
                    'span_1' => 'Endless Journey,',
                    'span_2' => 'Car Ready Anytime.'
                ],
                'paragraph' => 'Car rental with a fast process, the best prices, and no hassle. Choose your favorite car now!',
            ],
            'filter_section' => [
                ['filter_item' => 'car type'],
                ['filter_item' => 'price'],
                ['filter_item' => 'passenger'],
                ['filter_item' => 'transmission'],
            ],
            'whychooseus_section' => [
                'article' => [
                    'badge' => 'Built on Trust',
                    'title' => 'Why Choose Us?',
                    'paragraph' => 'Car rental with a fast process, the best prices, and no hassle. Choose your favorite car now!',
                ],
                'card' => [
                    [
                        'title' => 'Various Vehicle Options',
                        'url_image' => 'svg/cars.svg',
                        'description' => 'A wide selection of cars, from city cars to luxury SUVs, ready to accompany your journey.',
                    ],
                    [
                        'title' => 'Affordable Prices',
                        'url_image' => 'svg/money.svg',
                        'description' => 'Best prices with no hidden fees, making car rental more economical and transparent.',
                    ],
                    [
                        'title' => 'Flexible Rental Duration',
                        'url_image' => 'svg/time.svg',
                        'description' => 'Want to rent by the hour, day, week, or month? Choose according to your needs hassle-free!',
                    ],
                    [
                        'title' => 'Easy Online Booking',
                        'url_image' => 'svg/flash.svg',
                        'description' => 'Book a car anytime with a fast and practical online booking system.',
                    ],
                ],
            ],
            'wideselection_section' => [
                'badge' => 'About Us',
                'title' => 'Wide Selection of Rental Cars',
                'paragraph' => 'Find the perfect car for your trip with our easy car rental service. Whether for business trips or weekend getaways, we offer flexible rental options at the best prices. Experience comfort, reliability, and affordability with us.',
            ],
            'sports_&_luxury_section' => [
                'badge' => '200+ Sports & Luxury Vehicles',
                'title' => 'Explore Your Dream Car Now',
                'paragraph' => 'Find the perfect car for your trip with our easy car rental service. Whether for business trips or weekend getaways, we offer flexible rental options at the best prices. Experience comfort, reliability, and affordability with us.',
            ],
            'our_collection_section' => [
                'badge' => 'Best Picks',
                'title' => 'Our Collection Cars',
                'paragraph' => 'Discover a wide range of well-maintained vehicles, from compact city cars to premium SUVs — all ready to match your travel needs with comfort and style.',
            ],
            '' => [
                'badge' => '',
                'title' => '',
                'paragraph' => '',
            ],
        ],
        'rent_page' => [
            'hero_section' => [
                'badge' => 'Begin Your Trip With Us',
                'title' => [
                    'span_1' => 'Unlimited Adventures,',
                    'span_2' => 'Your Ride Awaits Anytime.'
                ],
                'paragraph' => 'Get behind the wheel quickly with our easy and affordable car rentals. Pick the perfect car for your journey today!',
            ],

        ],
        'login_page' => [
            'left_desktop' => [
                'badge' => 'Car Rental',
                'title' => 'Ready to hit the ',
                'subtitle' => 'road again?',
                'paragraph' => 'Log in to manage your rentals easily and drive with confidence.',
                'list' => [
                    'list1' => 'Instant booking confirmation',
                    'list2' => '24/7 customer support',
                    'list3' => 'Premium vehicle selection',
                ],
            ],
            'title' => 'Welcome Back',
            'subtitle' => 'Log in to your account',
            'or_login_with' => 'Or continue with',
            'remember' => 'Remember me',
            'errors' => [
                'email_required' => 'The email field is required.',
                'email_invalid' => 'The email must be a valid email address.',
                'password_required' => 'The password field is required.',
                'invalid_credentials' => 'The provided credentials do not match our records.',
            ],
            'label' => [
                'email' => 'Email',
                'password' => 'Password',
                'dont_have_account' => 'Don\'t have an account?',
            ],
            'placeholder' => [
                'email' => 'example@gmail.com',
                'password' => 'Enter your password',
            ],
        ],
        'signup_page' => [
            'left_desktop' => [
                'badge' => 'Car Rental',
                'title' => 'Join Our',
                'subtitle' => 'Amazing Community',
                'paragraph' => 'Start your journey with us and experience unforgettable moments with advanced features we have prepared for you.',
                'list' => [
                    'list1' => 'Unlimited access to all premium features',
                    'list2' => 'Responsive 24/7 customer support',
                    'list3' => 'Enterprise-grade data security'
                ]
            ],
            'title' => 'Create New Account',
            'subtitle' => 'Fill in the information below to get started',
            'label' => [
                'username' => 'Username',
                'email' => 'Email Address',
                'password' => 'Password',
                'confirm_password' => 'Confirm Password',
                'already_have_account' => 'Already have an account?'
            ],
            'placeholder' => [
                'username' => 'Enter your username',
                'email' => 'Enter your email address',
                'password' => 'Create a strong password',
                'confirm_password' => 'Repeat your password'
            ],
            'agree_to' => 'I agree to the',
            'terms_and_conditions' => 'Terms and Conditions',
            'and' => 'and',
            'privacy_policy' => 'Privacy Policy',
            'or_signup_with' => 'Or sign up with'
        ],
        'rentPage' => [
            'cars' => [
                [
                    'image' => 'https://img.freepik.com/free-psd/red-isolated-car_23-2151852884.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Acura Sport Version',
                    'price' => '35k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/blue-car_23-2151852886.jpg?ga=GA1.1.1234567890&semt=ais_hybrid&w=740',
                    'title' => 'BMW X5',
                    'price' => '45k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/white-suv-car_23-2151852890.jpg?ga=GA1.1.0987654321&semt=ais_hybrid&w=740',
                    'title' => 'Toyota RAV4',
                    'price' => '40k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/blue-car_23-2151852886.jpg?ga=GA1.1.1234567890&semt=ais_hybrid&w=740',
                    'title' => 'Mercedes-Benz C-Class',
                    'price' => '50k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/silver-sports-car_23-2151852892.jpg?ga=GA1.1.9876543210&semt=ais_hybrid&w=740',
                    'title' => 'Porsche 911',
                    'price' => '90k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/red-isolated-car_23-2151852884.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Tesla Model S',
                    'price' => '80k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/red-sports-car_23-2151852894.jpg?ga=GA1.1.2222222222&semt=ais_hybrid&w=740',
                    'title' => 'Ferrari F8',
                    'price' => '150k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/blue-car_23-2151852886.jpg?ga=GA1.1.1234567890&semt=ais_hybrid&w=740',
                    'title' => 'Ferrari F8',
                    'price' => '150k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://img.freepik.com/free-psd/red-sports-car_23-2151852894.jpg?ga=GA1.1.2222222222&semt=ais_hybrid&w=740',
                    'title' => 'Ferrari F8',
                    'price' => '150k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://hips.hearstapps.com/hmg-prod/images/2024-land-rover-range-rover-evoque-phev-102-65380162bded9.jpg?crop=0.829xw:0.701xh;0.131xw,0.0916xh&resize=1200:*',
                    'title' => 'Range Rover Evoque',
                    'price' => '70k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://www.usnews.com/object/image/00000194-2c64-dd98-a3ff-7f6fd3930000/25-hyundai-ioniq-5n-ext3.jpg?update-time=1735911592139&size=responsiveGallery',
                    'title' => 'Hyundai Ioniq 5',
                    'price' => '55k',
                    'duration' => 'Day',
                ],
                [
                    'image' => 'https://www.naplesillustrated.com/wp-content/uploads/sites/82/2020/05/Lexus-ES-1-696x474.jpg',
                    'title' => 'Lexus ES 350',
                    'price' => '60k',
                    'duration' => 'Day',
                ],
            ],

            'reviews' => [
                [
                    'image' => 'https://img.freepik.com/free-photo/brunette-businesswoman-inside-car_23-2148142465.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Great Experience!',
                    'description' => 'The car was in excellent condition and the process was smooth.',
                    'username' => 'Jovii_Dewilisa',
                    'rating' => 3.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/horizontal-portrait-smiling-happy-young-pleasant-looking-female-wears-denim-shirt-stylish-glasses-with-straight-blonde-hair-expresses-positiveness-poses_176420-13176.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/premium-photo/two-asian-friends-travel-by-car-clear-day-beautiful-blue-sky-they-was-happy-along-way-trip_208349-496.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Awesome Ride!',
                    'description' => 'Loved the ride. Very comfortable and easy to handle.',
                    'username' => 'Andi_Saputra',
                    'rating' => 4.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/medium-shot-man-sticking-out-tongue_23-2150171206.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/free-photo/brunette-businesswoman-inside-car_23-2148142465.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Great Experience!',
                    'description' => 'The car was in excellent condition and the process was smooth.',
                    'username' => 'Jovii_Dewilisa',
                    'rating' => 3.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/horizontal-portrait-smiling-happy-young-pleasant-looking-female-wears-denim-shirt-stylish-glasses-with-straight-blonde-hair-expresses-positiveness-poses_176420-13176.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/premium-photo/two-asian-friends-travel-by-car-clear-day-beautiful-blue-sky-they-was-happy-along-way-trip_208349-496.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Awesome Ride!',
                    'description' => 'Loved the ride. Very comfortable and easy to handle.',
                    'username' => 'Andi_Saputra',
                    'rating' => 4.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/medium-shot-man-sticking-out-tongue_23-2150171206.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/free-photo/brunette-businesswoman-inside-car_23-2148142465.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Great Experience!',
                    'description' => 'The car was in excellent condition and the process was smooth.',
                    'username' => 'Jovii_Dewilisa',
                    'rating' => 3.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/horizontal-portrait-smiling-happy-young-pleasant-looking-female-wears-denim-shirt-stylish-glasses-with-straight-blonde-hair-expresses-positiveness-poses_176420-13176.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/premium-photo/two-asian-friends-travel-by-car-clear-day-beautiful-blue-sky-they-was-happy-along-way-trip_208349-496.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Awesome Ride!',
                    'description' => 'Loved the ride. Very comfortable and easy to handle.',
                    'username' => 'Andi_Saputra',
                    'rating' => 4.75,
                    'profile_image' => 'https://img.freepik.com/free-photo/medium-shot-man-sticking-out-tongue_23-2150171206.jpg',
                ],
                [
                    'image' => 'https://img.freepik.com/premium-photo/image-young-asian-family-travel_296537-11071.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                    'title' => 'Highly Recommend',
                    'description' => 'Great service and reliable cars. Will rent again!',
                    'username' => 'Sinta_Ardiani',
                    'rating' => 5.0,
                    'profile_image' => 'https://img.freepik.com/free-psd/portrait-girl-teenager_23-2151717388.jpg?ga=GA1.1.1193633351.1743924281&semt=ais_hybrid&w=740',
                ],
            ],
        ],
    ],

    'button' => [
        'login' => 'Login',
        'signup' => 'Sign Up',
        'rent_now' => 'Rent Now',
        'explore_our_cars' => 'Explore Our Cars',
        'search' => 'Search',
        'registration' => 'Registration',
        'browse_cars' => 'Browse Cars',
        'book_now' => 'Book Now',
        'forgot_password' => 'Forgot Password?',
        'login_with_google' => 'Login with Google',
        'signup_with_google' => 'Sign Up with Google',
        'profile' => 'Profile',
    ],
];
