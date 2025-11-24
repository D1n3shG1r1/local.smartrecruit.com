@php
$degree = json_decode($candidate->degree);
$certifications =  json_decode($candidate->certifications);
$skills = json_decode($candidate->skills);
$languages = json_decode($candidate->languages);
$workExperience = json_decode($candidate->workExperience);
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ ucwords($candidate->fname . " " . $candidate->referral_code) }} - Resume</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        h2, h3, h4, h5 {
            margin: 0;
            padding: 0;
        }

        .section-title h2 {
            font-size: 22px;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .profile-img {
            max-width: 110px;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 25px;
        }

        ul {
            margin: 5px 0;
            padding-left: 18px;
        }

        .resume-title {
            margin-top: 25px;
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 1px solid #333;
            padding-bottom: 4px;
        }

        .resume-item {
            margin-bottom: 12px;
        }

        .skill-item, .lang-item {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>

<body>

{{-- =========================
       HEADER
========================= --}}
<div class="section-title">
    <h2>{{ ucwords($candidate->fname." ".$candidate->referral_code) }}</h2>
</div>

{{-- =========================
       BASIC PROFILE
========================= --}}
<div class="section">
    <img class="profile-img"
         src="{{ route('private.image', ['userId' => $candidate->candidateId, 'filename' => 'pp-' . $candidate->candidateId . '.jpg']) }}"
         onerror="this.src='{{ url('assets/admin/img/user-avatar.png') }}';"
         alt="{{ ucwords($candidate->fname) }}">

    <h3 class="resume-title">Basic Profile</h3>

    <p><strong>Age:</strong> {{ $candidate->age }}</p>
    <p><strong>Degree:</strong> {{ $degree[0]->degree }}</p>

    @if($candidate->purchased == 1)
        <p><strong>Phone:</strong> {{ $candidate->phone }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
        <p><strong>Birthday:</strong> {{ date("d M Y", strtotime($candidate->dob)) }}</p>
    @endif

    <p><strong>City:</strong> {{ $candidate->city }}</p>
    <p><strong>Country:</strong> {{ $candidate->country }}</p>
</div>

{{-- =========================
    PROFESSIONAL SUMMARY
========================= --}}
<div class="section">
    <h3 class="resume-title">Professional Summary</h3>
    <div class="resume-item">
        <h4>{{ ucwords($candidate->fname) }}</h4>
        <p><em>{{ $candidate->profSummary }}</em></p>
    </div>
</div>

{{-- =========================
       EDUCATION
========================= --}}
<div class="section">
    <h3 class="resume-title">Education</h3>

    @foreach($degree as $degreeRw)
        <div class="resume-item">
            <h4>{{ ucwords($degreeRw->degree) }}</h4>
            <h5>{{ date("M Y", strtotime($degreeRw->startdate)) }} -
                {{ date("M Y", strtotime($degreeRw->enddate)) }}
            </h5>
            <p><em>{{ ucwords($degreeRw->schoolinstitution) }}</em></p>
            <p>{{ ucwords($degreeRw->fieldofstudy) }}</p>
        </div>
    @endforeach
</div>


{{-- =========================
       CERTIFICATIONS
========================= --}}
<div class="section">
    <h3 class="resume-title">Certifications</h3>

    @foreach($certifications as $certificationRw)
        <div class="resume-item">
            <h4>{{ ucwords($certificationRw->title) }}</h4>
            <h5>{{ date("M Y", strtotime($certificationRw->date)) }}</h5>
            <p><em>{{ ucwords($certificationRw->organization) }}</em></p>
        </div>
    @endforeach
</div>


{{-- =========================
       WORK EXPERIENCE
========================= --}}
<div class="section">
    <h3 class="resume-title">Work Experience</h3>

    @foreach($workExperience as $work)
        <div class="resume-item">
            <h4>{{ ucwords($work->jobtitle) }}</h4>

            <h5>
                {{ date("M Y", strtotime($work->startdate)) }} -
                @if(!empty($work->enddate))
                    {{ date("M Y", strtotime($work->enddate)) }}
                @else
                    Present
                @endif
            </h5>

            <p><em>{{ ucwords($work->companyname) }}</em></p>

            <ul>
                @if(!empty($work->responsibilities))
                    <li>{{ ucwords($work->responsibilities) }}</li>
                @endif
                @if(!empty($work->achievements))
                    <li>{{ ucwords($work->achievements) }}</li>
                @endif
            </ul>
        </div>
    @endforeach
</div>

{{-- =========================
       SKILLS + LANGUAGES
========================= --}}
<div class="section">
    <h3 class="resume-title">Skills & Languages Known</h3>

    {{-- SKILLS --}}
    <div class="resume-item">
        <h4>Skills</h4>
        @foreach($skills as $idx => $skill)
            <span class="skill-item">
                {{ $idx > 0 ? ',' : '' }} <em>{{ ucwords($skill) }}</em>
            </span>
        @endforeach
    </div>

    {{-- LANGUAGES --}}
    <div class="resume-item">
        <h4>Languages</h4>

        @foreach($languages as $k => $language)
            @php
                $level = $language->proficiency == 1 ? "Beginner" :
                         ($language->proficiency == 2 ? "Intermediate" : "Advanced");
            @endphp

            <span class="lang-item">
                {{ $k > 0 ? ',' : '' }}
                <em>{{ ucfirst($language->language) }} - {{ $level }}</em>
            </span>
        @endforeach
    </div>
</div>

</body>
</html>
