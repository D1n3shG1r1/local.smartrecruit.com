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
<title>{{ ucwords($candidate->fname) }} - Resume</title>

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        background: #1E73BE;
        color: #fff;
        width: 30%;
        padding: 20px;
        display: inline-block;
        vertical-align: top;
        height: 100%;
    }

    .content {
        width: 68%;
        display: inline-block;
        vertical-align: top;
        padding: 20px;
    }

    .profile-img {
        width: 120px;
        border-radius: 4px;
        border: 2px solid #fff;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 15px;
        font-weight: bold;
        margin: 10px 0;
        color: #1E73BE;
        border-bottom: 1px solid #1E73BE;
        padding-bottom: 3px;
    }

    .white-title {
        color: #fff;
        border-bottom: 1px solid #fff;
    }

    ul {
        padding-left: 16px;
        margin: 0;
    }
</style>
</head>

<body>

<div class="sidebar">

    <img class="profile-img" src="{{ $imageSrc }}">

    <div class="white-title">Basic Profile</div>
    <p><strong>Age:</strong> {{ $candidate->age }}</p>
    <p><strong>Degree:</strong> {{ $degree[0]->degree }}</p>

    @if($candidate->purchased == 1)
        <p><strong>Phone:</strong> {{ $candidate->phone }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
    @endif

    <div class="white-title">Skills</div>
    <p>
        @foreach($skills as $i => $skill)
            {{ $i>0 ? ', ' : '' }} {{ ucwords($skill) }}
        @endforeach
    </p>

    <div class="white-title">Languages</div>
    <p>
        @foreach($languages as $i => $lang)
            @php $level=["","Beginner","Intermediate","Advanced"][$lang->proficiency]; @endphp
            {{ $i>0 ? ', ' : '' }} {{ ucfirst($lang->language) }} ({{ $level }})
        @endforeach
    </p>

</div>

<div class="content">

    <h2>{{ ucwords($candidate->fname." ".$candidate->referral_code) }}</h2>

    <div class="section-title">Professional Summary</div>
    <p>{{ $candidate->profSummary }}</p>

    <div class="section-title">Education</div>
    @foreach($degree as $d)
        <p>
            <strong>{{ ucwords($d->degree) }}</strong><br>
            <em>{{ ucwords($d->schoolinstitution) }}</em> <br>
            {{ date("M Y", strtotime($d->startdate)) }} - {{ date("M Y", strtotime($d->enddate)) }}<br>
            {{ ucwords($d->fieldofstudy) }}
        </p>
    @endforeach

    <div class="section-title">Work Experience</div>
    @foreach($workExperience as $w)
        <p>
            <strong>{{ ucwords($w->jobtitle) }}</strong><br>
            <em>{{ ucwords($w->companyname) }}</em><br>
            {{ date("M Y", strtotime($w->startdate)) }} –
            @if($w->enddate) {{ date("M Y", strtotime($w->enddate)) }} @else Present @endif
            <ul>
                @if($w->responsibilities) <li>{{ $w->responsibilities }}</li> @endif
                @if($w->achievements) <li>{{ $w->achievements }}</li> @endif
            </ul>
        </p>
    @endforeach

    <div class="section-title">Certifications</div>
    @foreach($certifications as $c)
        <p>
            <strong>{{ ucwords($c->title) }}</strong><br>
            <em>{{ ucwords($c->organization) }}</em><br>
            {{ date("M Y", strtotime($c->date)) }}
        </p>
    @endforeach

</div>

</body>
</html>
