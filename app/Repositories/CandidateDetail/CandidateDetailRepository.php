<?php

namespace App\Repositories\CandidateDetail;

use App\Models\Rate;
use App\Models\Topic;
use App\Models\Remark;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Assessment;
use App\Models\Interviewer;
use App\Models\InterviewStage;
use App\Models\InterviewAssign;
use App\Models\AssessmentResult;
use Illuminate\Support\Facades\DB;

class CandidateDetailRepository implements CandidateDetailRepoInterface
{
  public function get()
  {

  }



//   public function show($id)
//   {
//     //   $interview = Interview::with('interviewStage')
//     //       ->with('interviewStage.assessment.assessmentResult.topic')
//     //       ->with('interviewStage.assessment.assessmentResult.rate')
//     //       ->with('interviewAssign.remarks')
//     //       ->with('candidate')
//     //       ->findOrFail($id);

//     $data= Candidate::with('interviews.interviewStage', 'position', 'agency','specificLanguages.devlanguage')->where('id', $id)->get();
//     dd($data);


//   }
public function show($id)
{
    // $candidate = Candidate::findOrFail($id);

    // $interviews = $candidate->interviews()->with('interviewStage', 'interviewAssign.interviewer', 'interviewAssign.assessment.assessmentResult.topic', 'interviewAssign.assessment.assessmentResult.rate', 'interviewStage.remarks')->get();

    // return response()->json([
    //     'candidate' => $candidate,
    //     'interviews' => $interviews
    // ]);
    //   $interview = Interview::findOrFail($id);

    //     $interviewStage = InterviewStage::where('id', $interview->interview_stage_id)->first();

    //     $interviewer = Interviewer::where('id', $interview->interviewAssign->interviewer_id)->first();

    //     $assessment = Assessment::where('id', $interview->interviewAssign->assessment_id)->first();

    //     $assessmentResult = AssessmentResult::where('assessment_id', $assessment->id)->get();

    //     $topics = Topic::whereIn('id', $assessmentResult->pluck('topic_id'))->get();

    //     $rates = Rate::whereIn('id', $assessmentResult->pluck('rate_id'))->get();

    //     $remarks = Remark::where('interview_assign_id', $interview->interviewAssign->id)->get();

    //     $candidate = Candidate::where('id', $interview->candidate_id)->first();

    //     return response()->json([
    //         'interview' => $interview,
    //         'interviewStage' => $interviewStage,
    //         'interviewer' => $interviewer,
    //         'assessment' => $assessment,
    //         'assessmentResult' => $assessmentResult,
    //         'topics' => $topics,
    //         'rates' => $rates,
    //         'remarks' => $remarks,
    //         'candidate' => $candidate,
    //     ]);



        $interview = Interview::findOrFail($id);

        $interviewStage = InterviewStage::where('id', $interview->interview_stage_id)->first();

        $interviewAssign = InterviewAssign::where('interview_id', $interview->id)->first();

        $interviewer = $interviewAssign ? Interviewer::where('id', $interviewAssign->interviewer_id)->first() : null;

        $assessment = $interviewAssign ? Assessment::where('id', $interviewAssign->assessment_id)->first() : null;

        $assessmentResult = $assessment ? AssessmentResult::where('assessment_id', $assessment->id)->get() : [];

        $topics = $assessmentResult ? Topic::whereIn('id', $assessmentResult->pluck('topic_id'))->get() : [];

        $rates = $assessmentResult ? Rate::whereIn('id', $assessmentResult->pluck('rate_id'))->get() : [];

        $remarks = $interviewAssign ? Remark::where('interview_assign_id', $interviewAssign->id)->get() : [];

        $candidate = Candidate::where('id', $interview->candidate_id)->first();

        return response()->json([
            'interview' => $interview,
            'interviewStage' => $interviewStage,
            'interviewer' => $interviewer,
            'assessment' => $assessment,
            'assessmentResult' => $assessmentResult,
            'topics' => $topics,
            'rates' => $rates,
            'remarks' => $remarks,
            'candidate' => $candidate,
        ]);
    }
}



