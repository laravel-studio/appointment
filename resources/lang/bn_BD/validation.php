<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'এই :attribute টি অবশ্যই গ্রহণ করতে হবে।',
    'active_url' => 'এই :attribute টি কোনও বৈধ URL নয়।',
    'after' => 'এই :attribute টি :date তারিখের পরে অবশ্যই একটি তারিখ হতে হবে।',
    'after_or_equal' => 'এই :attribute টি :date তারিখের পরে বা সমান অবশ্যই একটি তারিখ হতে হবে।',
    'alpha' => 'এই :attribute টিতে কেবলমাত্র অক্ষর থাকতে পারে।',
    'alpha_dash' => 'এই :attribute টিতে কেবল অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে পারে।',
    'alpha_num' => 'এই :attribute টিতে কেবল অক্ষর এবং সংখ্যা থাকতে পারে।',
    'array' => 'এই :attribute টি অবশ্যই একটি অ্যারে হতে হবে।',
    'before' => 'এই :attribute টি অবশ্যই :date তারিখের পূর্বে একটি তারিখ হতে হবে।',
    'before_or_equal' => 'এই :attribute টি অবশ্যই একটি :date তারিখের পূর্বে বা সমান তারিখ হতে হবে।',
    'between' => [
        'numeric' => 'এই :attribute টি অবশ্যই :min এবং :max এর মধ্যে হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই :min এবং :max কিলোবাইটের মধ্যে হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই :min এবং :max অক্ষরের মধ্যে হতে হবে।',
        'array' => 'এই :attribute টি অবশ্যই :min এবং :max আইটেমের মধ্যে হতে হবে।',
    ],
    'boolean' => 'এই :attribute ক্ষেত্রটি অবশ্যই সত্য বা মিথ্যা হতে হবে।',
    'confirmed' => 'এই :attribute এর নিশ্চিতকরণ মেলে না।',
    'date' => 'এই :attribute টি বৈধ তারিখ নয়।',
    'date_equals' => 'এই :attribute টি অবশ্যই :date তারিখের সমান তারিখ হতে হবে।',
    'date_format' => 'এই :attribute টি :format টি ফরম্যাট এর সাথে মেলে না',
    'different' => 'এই :attribute টি এবং :other অবশ্যই আলাদা হতে হবে।',
    'digits' => 'এই :attribute টি অবশ্যই :digits অঙ্কের সংখ্যা হতে হবে।',
    'digits_between' => 'এই :attribute টি অবশ্যই :min এবং :max মধ্যে সংখ্যা হতে হবে।',
    'dimensions' => 'এই :attribute এর অবৈধ চিত্রের মাত্রা রয়েছে।',
    'distinct' => 'এই :attribute ক্ষেত্রটির একটি সদৃশ মান আছে।',
    'email' => 'এই :attribute টি অবশ্যই একটি বৈধ ইমেল ঠিকানা হতে হবে।',
    'ends_with' => 'এই :attribute টি অবশ্যই নিম্নলিখিত: :values একটির সাথে শেষ হতে হবে',
    'exists' => 'এই নির্বাচিত :attribute টি অবৈধ।',
    'file' => 'এই :attribute টি অবশ্যই একটি ফাইল হতে হবে।',
    'filled' => 'এই :attribute ক্ষেত্রের অবশ্যই একটি মান থাকতে হবে।',
    'gt' => [
        'numeric' => 'এই :attribute টি :value চেয়ে বড় হওয়া আবশ্যক।',
        'file' => 'এই :attribute টি :value কিলোবাইট এর চেয়ে বড় হওয়া আবশ্যক।',
        'string' => 'এই :attribute টি :value অক্ষরের চেয়ে অবশ্যই বেশি হতে হবে।',
        'array' => 'এই :attribute এর :value আইটেমের চেয়ে বেশি থাকতে হবে।',
    ],
    'gte' => [
        'numeric' => 'এই :attribute টি :value চেয়ে বড় বা সমান হতে হবে।',
        'file' => 'এই :attribute টি :value কিলোবাইটের চেয়ে বড় বা সমান হতে হবে।',
        'string' => 'এই :attribute টি :value অক্ষরের চেয়ে বৃহত্তর বা সমান হতে হবে।',
        'array' => 'এই :attribute টি :value আইটেম বা আরও অনেক বেশি আইটেম থাকা আবশ্যক।',
    ],
    'image' => 'এই :attribute টি অবশ্যই একটি চিত্র হতে হবে।',
    'in' => 'এই নির্বাচিত :attribute টি অবৈধ।',
    'in_array' => 'এই :attribute ক্ষেত্রটি :other এর মধ্যে বিদ্যমান নেই।',
    'integer' => 'এই :attribute টি একটি অবশ্যই পূর্ণসংখ্যা হতে হবে।',
    'ip' => 'এই :attribute টিকে অবশ্যই একটি বৈধ IP address হতে হবে।',
    'ipv4' => 'এই :attribute টিকে অবশ্যই একটি বৈধ IPv4 address হতে হবে।',
    'ipv6' => 'এই :attribute টিকে অবশ্যই একটি বৈধ IPv6 address হতে হবে।',
    'json' => 'এই :attribute টিকে অবশ্যই একটি বৈধ JSON string হতে হবে।',
    'lt' => [
        'numeric' => 'এই :attribute টি অবশ্যই :value এর চেয়ে কম হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই :value কিলোবাইট এর চেয়ে কম হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই :value অক্ষরের চেয়ে কম হতে হবে।',
        'array' => 'এই :attribute টির অবশ্যই :value চেয়ে কম আইটেম থাকতে হবে।',
    ],
    'lte' => [
        'numeric' => 'এই :attribute টি অবশ্যই :value চেয়ে কম বা সমান হবে।',
        'file' => 'এই :attribute টি অবশ্যই :value কিলোবাইটের চেয়ে কম বা সমান হবে।',
        'string' => 'এই :attribute টি অবশ্যই :value অক্ষরের চেয়ে কম বা সমান হবে।',
        'array' => 'এই :attribute টির অবশ্যই :value আইটেমের চেয়ে বেশি থাকা উচিত না।',
    ],
    'max' => [
        'numeric' => 'এই :attribute টি হয়তো :max এর থেকে বেশি হবে না।',
        'file' => 'এই :attribute টি হয়তো :max কিলোবাইট এর থেকে বেশি হবে না।',
        'string' => 'এই :attribute টি হয়তো :max অক্ষরের থেকে বেশি হবে না।',
        'array' => 'এই :attribute টি হয়তো :max আইটেমের থেকে বেশি হবে না।',
    ],
    'mimes' => 'এই :attribute টিকে অবশ্যই একটি: :values এর ফাইল টাইপ হতে হবে।',
    'mimetypes' => 'এই :attribute টিকে অবশ্যই একটি: :values এর ফাইল টাইপ হতে হবে।',
    'min' => [
        'numeric' => 'এই :attribute টিকে অবশ্যই অন্তত :min হতে হবে।',
        'file' => 'এই :attribute টিকে অবশ্যই অন্তত :min কিলোবাইট হতে হবে।',
        'string' => 'এই :attribute টিকে অবশ্যই অন্তত :min অক্ষরের হতে হবে।',
        'array' => 'এই :attribute টিকে অবশ্যই অন্তত :min আইটেমের হতে হবে।',
    ],
    'not_in' => 'এই নির্বাচিত :attribute টি অবৈধ।',
    'not_regex' => 'এই নির্বাচিত :attribute ফরম্যাটটি অবৈধ।',
    'numeric' => 'এই :attribute টি অবশ্যই একটি সংখ্যা হতে হবে।',
    'present' => 'এই :attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'regex' => 'এই :attribute ফরম্যাট টি অবৈধ।',
    'required' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন।',
    'required_if' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যখন :other হলো :value।',
    'required_unless' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যতক্ষণ না :other থাকে :values মধ্যে।',
    'required_with' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যখন :values উপস্থিত।',
    'required_with_all' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যখন :values উপস্থিত।',
    'required_without' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যখন :values উপস্থিত নয়।',
    'required_without_all' => 'এই :attribute ক্ষেত্রটি থাকা প্রয়োজন যখন কোনো :values উপস্থিত নয়।',
    'same' => 'এই :attribute টি এবং :other অবশ্যই সমকক্ষ হত্তয়া উচিত।',
    'size' => [
        'numeric' => 'এই :attribute এর অবশ্যই :size এর হত্তয়া উচিত।',
        'file' => 'এই :attribute এর অবশ্যই :size কিলোবাইটের হত্তয়া উচিত।',
        'string' => 'এই :attribute এর অবশ্যই :size অক্ষরের হত্তয়া উচিত।',
        'array' => 'এই :attribute এর অবশ্যই :size আইটেম থাকা উচিত।',
    ],
    'starts_with' => 'এই :attribute এর অবশ্যই নিম্নলিখিত: :values গুলির মধ্যে একটির দ্বারা শুরু হওয়া উচিত।',
    'string' => 'এই :attribute টিকে অবশ্যই একটি স্ট্রিং হতে হবে।',
    'timezone' => 'এই :attribute টিকে অবশ্যই একটি বৈধ জোন।',
    'unique' => 'এই :attribute টি আগেই নেওয়া হয়ে গেছে।',
    'uploaded' => 'এই :attribute টির আপলোড অসফল হয়েছে।',
    'url' => 'এই :attribute টির ফরম্যাট অবৈধ।',
    'uuid' => 'এই :attribute টিকে অবশ্যই একটি বৈধ UUID হতে হবে।',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
