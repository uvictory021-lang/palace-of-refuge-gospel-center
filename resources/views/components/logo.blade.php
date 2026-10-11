@props(['class' => 'h-10 w-10'])

{{--
    Assumption: the source PNG has a solid dark-maroon square background
    (not transparent), which happens to sit very close to --color-burgundy-dark,
    so it reads cleanly against the navbar/footer. If you get a
    transparent-background export later, this component won't need to change.
--}}
<img
    src="{{ asset('images/branding/logo.png') }}"
    alt="Palace Of Refuge Gospel Center crest"
    class="{{ $class }} object-contain"
    loading="lazy"
    width="96"
    height="96"
>