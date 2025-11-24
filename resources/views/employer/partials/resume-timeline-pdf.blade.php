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
    body { font-family:DejaVu Sans; margin:0; padding:20px; font-size:12px; }

    .section-title {
        font-weight:bold;
        color:#1E73BE;
        border-bottom:1px solid #1E73BE;
        margin-top:20px;
        padding-bottom:3px;
        font-size:15px;
    }

    .timeline {
        border-left: 3px solid #1E73BE;
        padding-left: 15px;
        margin-left: 5px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #1E73BE;
        display:inline-block;
        margin-left:-24px;
        margin-right:10px;
    }
</style>

</head>
<body>

<h1 style="color:#1E73BE;">{{ ucwords($candidate->fname.' '.$candidate->referral_code) }}</h1>

<div class="section-title">Professional Summary</div>
<p>{{ $candidate->profSummary }}</p>

<div class="section-title">Work Experience (Timeline)</div>

<div class="timeline">
@foreach($workExperience as $w)
    <p>
        <span class="dot"></span>
        <strong>{{ ucwords($w->jobtitle) }}</strong> at {{ ucwords($w->companyname) }}<br>
        <em>{{ date("M Y", strtotime($w->startdate)) }} -
        @if($w->enddate) {{ date("M Y", strtotime($w->enddate)) }} @else Present @endif</em>

        <ul>
            @if($w->responsibilities) <li>{{ $w->responsibilities }}</li> @endif
            @if($w->achievements) <li>{{ $w->achievements }}</li> @endif
        </ul>
    </p>
@endforeach
</div>

<div class="section-title">Education</div>
@foreach($degree as $d)
    <p><strong>{{ $d->degree }}</strong><br>
    <em>{{ $d->schoolinstitution }}</em><br>
    {{ date("M Y", strtotime($d->startdate)) }} - {{ date("M Y", strtotime($d->enddate)) }}<br>
    {{ $d->fieldofstudy }}</p>
@endforeach

<div class="section-title">Skills</div>
<p>@foreach($skills as $i=>$s) {{ $i>0?',':'' }} {{ $s }} @endforeach</p>

<div class="section-title">Languages</div>
<p>
@foreach($languages as $i=>$l)
    @php $level=["","Beginner","Intermediate","Advanced"][$l->proficiency]; @endphp
    {{ $i>0?',':'' }} {{ $l->language }} ({{ $level }})
@endforeach
</p>

</body>
</html>
