@php
$degree = json_decode($candidate->degree);
$certifications =  json_decode($candidate->certifications);
$skills = json_decode($candidate->skills);
$languages = json_decode($candidate->languages);
$workExperience = json_decode($candidate->workExperience);


$filename = 'pp-' . $candidate->candidateId . '.jpg';
$userId = $candidate->candidateId;
$path = "users/{$userId}/assets/images/{$filename}";
$file = Storage::disk('local')->get($path);

if (Storage::disk('local')->exists($path)){
    // Convert image to base64 so DOMPDF always loads it
    $imageData = base64_encode($file);
    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
    
} else {
    // fallback default avatar
    $defaultPath = public_path('assets/admin/img/user-avatar.png');
    $imageSrc = 'data:image/png;base64,' . base64_encode(file_get_contents($defaultPath));
    
}

@endphp
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
    body { font-family: DejaVu Sans; margin:0; font-size:12px; }

    .header {
        width: 100%;
        background: #1E73BE;
        color: #fff;
        padding: 20px;
    }

    .header-lower {
        width: 100%;
        background: #f0f4f8;
        padding: 10px 20px;
        border-bottom: 2px solid #1E73BE;
    }

    .photo {
        width: 110px;
        border-radius: 4px;
        border: 2px solid #fff;
        vertical-align: middle;
        display:inline-block;
    }

    .name-block {
        display:inline-block;
        vertical-align:middle;
        margin-left: 20px;
    }

    .section-title {
        font-size: 15px;
        color: #1E73BE;
        margin-top: 20px;
        border-bottom: 1px solid #1E73BE;
        padding-bottom: 3px;
        font-weight: bold;
    }

    ul { padding-left: 16px; margin:0; }
</style>
</head>

<body>

<div class="header">
    
    <img class="photo" src="{{ $imageSrc }}">

    <div class="name-block">
        <h1 style="margin:0; font-size:26px;">
            {{ ucwords($candidate->fname.' '.$candidate->referral_code) }}
        </h1>
        <p style="margin:0;">{{ $candidate->city }}, {{ $candidate->country }}</p>
        @if($candidate->purchased == 1)
            <p>Phone:{{ $candidate->phone }}, Email:{{ $candidate->email }}</p>
        @endif
    </div>
</div>

<div class="header-lower">
    <strong>Professional Summary:</strong> {{ $candidate->profSummary }}
</div>

<div style="padding:20px;">

    <div class="section-title">Education</div>
    @foreach($degree as $d)
        <p><strong>{{ $d->degree }}</strong><br>
        <em>{{ $d->schoolinstitution }}</em><br>
        {{ date("M Y", strtotime($d->startdate)) }} - {{ date("M Y", strtotime($d->enddate)) }}<br>
        {{ $d->fieldofstudy }}</p>
    @endforeach

    <div class="section-title">Work Experience</div>
    @foreach($workExperience as $w)
        <p><strong>{{ $w->jobtitle }}</strong> — <em>{{ $w->companyname }}</em><br>
        {{ date("M Y", strtotime($w->startdate)) }} -
        @if($w->enddate) {{ date("M Y", strtotime($w->enddate)) }} @else Present @endif
        <ul>
            @if($w->responsibilities) <li>{{ $w->responsibilities }}</li> @endif
            @if($w->achievements) <li>{{ $w->achievements }}</li> @endif
        </ul>
        </p>
    @endforeach

    <div class="section-title">Certifications</div>
    @foreach($certifications as $c)
        <p><strong>{{ $c->title }}</strong><br>
        <em>{{ $c->organization }}</em><br>
        {{ date("M Y", strtotime($c->date)) }}</p>
    @endforeach

    <div class="section-title">Skills</div>
    <p>@foreach($skills as $i=>$s) {{ $i>0?',':'' }} {{ ucwords($s) }} @endforeach</p>

    <div class="section-title">Languages</div>
    <p>
        @foreach($languages as $i=>$l)
            @php $level=["","Beginner","Intermediate","Advanced"][$l->proficiency]; @endphp
            {{ $i>0?',':'' }} {{ ucfirst($l->language) }} ({{ $level }})
        @endforeach
    </p>

    <div class="section-title">Basic Profile</div>
    <p><strong>Age:</strong> {{ $candidate->age }} Yrs</p>
    <p><strong>Degree:</strong> {{ $degree[0]->degree }}</p>
    @if($candidate->purchased == 1)
        <p><strong>Phone:</strong> {{ $candidate->phone }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
    @endif
</div>

</body>
</html>
