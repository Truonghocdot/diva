@extends('layouts.app')

@section('title', 'About Us | The Tactile Sanctuary')
@section('meta_description', 'Câu chuyện thương hiệu nến thơm Diva: nguyên liệu tự nhiên, quy trình thủ công và trải nghiệm đa giác quan.')
@section('canonical_url', url('/about'))

@section('content')
<main class="pt-48 pb-32 px-8 max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-24 items-center mb-32">
        <div class="space-y-8">
            <h2 class="text-xs font-label uppercase tracking-[0.3em] text-primary font-bold">Câu chuyện của chúng tôi</h2>
            <h1 class="text-5xl md:text-7xl font-headline font-light leading-tight italic">Nơi mùi hương <br/> chạm đến linh hồn.</h1>
            <p class="text-xl text-on-surface-variant font-light leading-relaxed">
                Được thành lập vào năm {{ date('Y') }}, The Tactile Sanctuary khởi đầu từ mong muốn tạo ra một không gian bình yên trong tâm trí mỗi người giữa nhịp sống hối hả.
            </p>
        </div>
        <div class="relative aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl skew-y-1">
            <img class="w-full h-full object-cover" src="https://arteproduct.com/wp-content/uploads/2023/08/nen-thom-arte-tron.jpg"/>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 py-32 border-t border-outline-variant/20">
        <div class="space-y-4">
            <h3 class="text-xl font-headline font-medium">Nguyên liệu tự nhiên</h3>
            <p class="text-on-surface-variant font-light">Chúng tôi sử dụng 100% sáp đậu nành và bấc cotton không chì, đảm bảo an toàn cho sức khỏe và môi trường.</p>
        </div>
        <div class="space-y-4">
            <h3 class="text-xl font-headline font-medium">Thủ công tỉ mỉ</h3>
            <p class="text-on-surface-variant font-light">Mỗi hũ nến đều được rót tay trực tiếp tại xưởng nhỏ của chúng tôi, mang theo tâm huyết và lòng yêu nghề.</p>
        </div>
        <div class="space-y-4">
            <h3 class="text-xl font-headline font-medium">Trải nghiệm đa giác quan</h3>
            <p class="text-on-surface-variant font-light">Không chỉ là mùi hương, đó là sự kết hợp của thị giác, xúc giác và cảm xúc khi bạn thắp lên một ngọn lửa nhỏ.</p>
        </div>
    </div>
</main>

@include('partials.newsletter')
@endsection
