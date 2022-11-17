<section class="w-full py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:place-items-center p-2">
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[1] == 'done') bg-areakerja/40 @elseif($step[1] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">1</div>
            <div>
                <div class="text-xs">Step 1</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.mitra.information.index') }}">Information</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[2] == 'done') bg-areakerja/40 @elseif($step[2] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">2</div>
            <div>
                <div class="text-xs">Step 2</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.mitra.agreement.index') }}">Agreement</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    @if(!empty($partner->approved_at))
        <div class="alert alert-success">Approved on {{ date_format($partner->approved_at, 'd F Y H:i:s') }}</div>
    @elseif(!empty($partner->rejected_at))
        <div class="alert alert-error">Rejected on {{ date_format($partner->rejected_at, 'd F Y H:i:s') }}</div>
    @elseif(!empty($partner->submitted_at))
        <div class="alert alert-success">Submitted on {{ date_format($partner->submitted_at, 'd F Y H:i:s A') }}</div>
    @endif
</section>
