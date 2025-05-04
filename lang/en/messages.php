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
                'title' => 'Our Customer Reviews',
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
                        'description' => 'A wide selection of cars, from city cars to luxury SUVs, ready to accompany your journey.',
                    ],
                    [
                        'title' => 'Affordable Prices',
                        'description' => 'Best prices with no hidden fees, making car rental more economical and transparent.',
                    ],
                    [
                        'title' => 'Flexible Rental Duration',
                        'description' => 'Want to rent by the hour, day, week, or month? Choose according to your needs hassle-free!',
                    ],
                    [
                        'title' => 'Easy Online Booking',
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
            '' => [
                'badge' => '',
                'title' => '',
                'paragraph' => '',
            ],
            '' => [
                'badge' => '',
                'title' => '',
                'paragraph' => '',
            ],
        ],
        'signup_page' => [
            'title' => 'Sign Up Now',
            'label' => [
                'name' => [
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                ],
                'email' => 'Email',
                'password' => 'Password',
                'confirm_password' => 'Confirm Password',
                'phone_number' => 'Phone Number',
                'address' => 'Address',
                'already_have_account' => 'Already have an account?',
                'card' => [
                    'resident_identity_card' => 'Resident Identity Card',
                    'driver_license' => 'Driver’s License',
                    'photo_of_resident_identity_card' => 'Photo of Resident Identity Card',
                    'photo_of_driver_license' => 'Photo of Driver’s License',
                ],
            ],
            'placeholder' => [
                'first_name' => 'Enter your first name',
                'last_name' => 'Enter your last name',
                'email' => 'example@gmail.com',
                'password' => 'Enter your password',
                'confirm_password' => 'Enter your confirm password',
                'phone_number' => 'Enter your phone number',
                'address' => 'Enter your complete address',
                'resident_identity_card' => 'Enter your resident identity card',
                'driver_license' => 'Enter your driver license',
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
    ],
];
