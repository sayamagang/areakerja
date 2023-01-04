@extends('templates.admin.page')

@section('content')
    <section>
        <form action="{{ route('admin.lowongan.store') }}" method="post">
            @csrf
            <div class="textbox-group">
                <label for="partner">Mitra</label>
                <select name="partner" id="partner">
                    @foreach($partners as $partner)
                        <option value="{{ $partner->id }}">{{ $partner->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="textbox-group">
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" id="jobTitle" value="{{ old('jobTitle') }}" @error('jobTitle') class="textbox-error" @enderror>
                @error('jobTitle')
                <span class="text-error">{{ $errors->first('jobTitle') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobDesc">Job Description</label>
                <textarea name="jobDesc" id="jobDesc" rows="10" @error('jobDesc') class="textbox-error" @enderror>{{ old('jobDesc') }}</textarea>
                @error('jobDesc')
                <span class="text-error">{{ $errors->first('jobDesc') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobMainSkill">Main Skill</label>
                <select name="jobMainSkill" id="jobMainSkill" @error('jobMainSkill') class="textbox-error" @enderror>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('jobMainSkill')
                <span class="text-error">{{ $errors->first('jobMainSkill') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobOtherSkill">Other Skill <span class="text-gray-400 text-xs ml-1">Opsional</span></label>
                <select name="jobOtherSkill[]" id="jobOtherSkill" @error('jobOtherSkill') class="textbox-error" @enderror multiple size="5">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('jobOtherSkill')
                <span class="text-error">{{ $errors->first('jobOtherSkill') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobMinSalary">Minimum Salary</label>
                <input type="number" name="jobMinSalary" id="jobMinSalary" value="{{ old('jobMinSalary') }}" @error('jobMinSalary') class="textbox-error" @enderror>
                @error('jobMinSalary')
                <span class="text-error">{{ $errors->first('jobMinSalary') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobMaxSalary">Maximum Salary</label>
                <input type="number" name="jobMaxSalary" id="jobMaxSalary" value="{{ old('jobMaxSalary') }}" @error('jobMaxSalary') class="textbox-error" @enderror>
                @error('jobMaxSalary')
                <span class="text-error">{{ $errors->first('jobMaxSalary') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobDeadline">Deadline</label>
                <input type="datetime-local" name="jobDeadline" id="jobDeadline" value="{{ old('jobDeadline') ?? date('Y-m-d H:i', time() + 86400) }}" min="{{ date('Y-m-d H:i', time() + 86400) }}" @error('jobDeadline') class="textbox-error" @enderror>
                @error('jobDeadline')
                <span class="text-error">{{ $errors->first('jobDeadline') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Tambah Lowongan</button>
            </div>
        </form>
    </section>
@endsection

@section('headerJS')
    <link rel="stylesheet" href="{{ asset('sceditor/themes/default.min.css') }}"/>
    <script src="{{ asset('sceditor/sceditor.min.js') }}"></script>
    <script src="{{ asset('sceditor/formats/bbcode.js') }}"></script>
@endsection

@section('footerJS')
    <script>
        var textarea = document.getElementById('jobDesc');
        sceditor.create(textarea, {
            format: 'bbcode',
            plugins: 'undo,plaintext',
            width: '100%',
            bbcodeTrim: false,
            toolbar: "bold,italic,underline,strike|left,center,right,justify|size,color,removeformat|bulletlist,orderedlist|code,quote,horizontalrule|image,link,unlink,youtube|emoticon,source",
            resizeWidth: false,
            emoticonsEnabled: true,
            emoticonsRoot: "{{ asset('sceditor') . '/' }}",
            style: "{{ asset('sceditor/themes/content/default.min.css') }}",
        });
    </script>
@endsection
