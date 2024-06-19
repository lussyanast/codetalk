@extends('layouts.app')

@section('body')
  <section class="container hero bg-green py-5 shadow" style="margin-top: 4rem;">
    <div class="row align-items-center h-100">
      <div class="col-12 text-center">
        <h1 class="text-white">FREQUENTLY ASKED QUESTIONS</h1>
        <h4>Do you have any questions about CodeTalk?</h4>
        <p>Find the various information available below.</p>
      </div>
    </div>
  </section>

  <section class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Apa itu CodeTalk?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                CodeTalk adalah sebuah platform diskusi untuk tanya jawab seputar teknologi.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Apa tujuan CodeTalk dibuat?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Untuk memudahkan para pengembang teknologi untuk bertanya dan dapat membagikan ilmunya.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Bagaimana caranya berkontribusi?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Anda dapat berkontribusi dengan cara membuat akun dan membuat atau pun menjawab diskusi-diskusi yang ada.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
