@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('Apply for Support') }}</span>
                <h1>{{ __('Submit Your Climate Project') }}</h1>
                <p>{{ __('We work with governments, NGOs, and institutions in Least Developed Countries to design, fund, and implement climate projects. Tell us about your initiative.') }}</p>
            </div>
        </section>

        <!-- Workflow -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('How It Works') }}</h2>
                    <p>{{ __('Our partnership pathway is designed to move efficiently from concept to implementation.') }}</p>
                </div>
            </div>
            <div class="workflow-grid">
                <div class="workflow-step">
                    <div class="workflow-number">1</div>
                    <h3>{{ __('Submit Project') }}</h3>
                    <p>{{ __('Share your climate project concept, context, and expected outcomes.') }}</p>
                </div>
                <div class="workflow-step">
                    <div class="workflow-number">2</div>
                    <h3>{{ __('Eligibility Review') }}</h3>
                    <p>{{ __('We confirm alignment with LDC priorities and our areas of support.') }}</p>
                </div>
                <div class="workflow-step">
                    <div class="workflow-number">3</div>
                    <h3>{{ __('Technical Assessment') }}</h3>
                    <p>{{ __('Our team evaluates feasibility, impact potential, and funding pathways.') }}</p>
                </div>
                <div class="workflow-step">
                    <div class="workflow-number">4</div>
                    <h3>{{ __('Partnership Discussion') }}</h3>
                    <p>{{ __('We discuss roles, resources, and co-design the implementation plan.') }}</p>
                </div>
                <div class="workflow-step">
                    <div class="workflow-number">5</div>
                    <h3>{{ __('Project Development') }}</h3>
                    <p>{{ __('Together we develop proposals, conduct studies, and prepare documentation.') }}</p>
                </div>
                <div class="workflow-step">
                    <div class="workflow-number">6</div>
                    <h3>{{ __('Funding Pathway') }}</h3>
                    <p>{{ __('We connect you to climate finance sources and support submission.') }}</p>
                </div>
            </div>
        </section>

        <!-- Eligibility & Support -->
        <section class="section">
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __('Eligibility Criteria') }}</h3>
                    <ul class="check-list">
                        <li>{{ __('Organization based in or operating primarily in an LDC') }}</li>
                        <li>{{ __('Clear climate adaptation, mitigation, or resilience objective') }}</li>
                        <li>{{ __('Commitment to measurable outcomes and reporting') }}</li>
                        <li>{{ __('Willingness to collaborate with local and national stakeholders') }}</li>
                    </ul>
                </article>
                <article class="card">
                    <h3>{{ __('Supported Project Types') }}</h3>
                    <ul class="check-list">
                        <li>{{ __('Climate resilience and adaptation plans') }}</li>
                        <li>{{ __('Sustainable agriculture and food security') }}</li>
                        <li>{{ __('Low-carbon development and renewable energy') }}</li>
                        <li>{{ __('Carbon market project development') }}</li>
                        <li>{{ __('Climate finance readiness and proposal development') }}</li>
                    </ul>
                </article>
                <article class="card">
                    <h3>{{ __('Support We Provide') }}</h3>
                    <ul class="check-list">
                        <li>{{ __('Technical assistance and project design') }}</li>
                        <li>{{ __('Feasibility studies and baseline assessments') }}</li>
                        <li>{{ __('Access to climate finance mechanisms') }}</li>
                        <li>{{ __('Capacity building and knowledge transfer') }}</li>
                        <li>{{ __('Long-term implementation guidance') }}</li>
                    </ul>
                </article>
            </div>
        </section>

        <!-- Application Form -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('Application Form') }}</h2>
                    <p>{{ __('Complete the form below to start the conversation. We will respond within 10 business days.') }}</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <form class="contact-form" method="POST" action="{{ route('contact.send', ['locale' => $locale]) }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('Full Name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" required maxlength="255">
                            @error('name')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="organization" class="form-label">{{ __('Organization') }}</label>
                            <input type="text" id="organization" name="organization" class="form-control" required maxlength="255">
                            @error('organization')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" required maxlength="255">
                            @error('email')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input type="text" id="phone" name="phone" class="form-control" maxlength="50">
                            @error('phone')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="country" class="form-label">{{ __('Country') }}</label>
                            <input type="text" id="country" name="country" class="form-control" required maxlength="255">
                            @error('country')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="organization_type" class="form-label">{{ __('Organization Type') }}</label>
                            <select id="organization_type" name="organization_type" class="form-control" required>
                                <option value="">{{ __('Select type') }}</option>
                                <option value="government">{{ __('Government / Ministry') }}</option>
                                <option value="municipality">{{ __('Municipality / City') }}</option>
                                <option value="ngo">{{ __('NGO / Civil Society') }}</option>
                                <option value="academic">{{ __('Academic / Research') }}</option>
                                <option value="private">{{ __('Private Sector') }}</option>
                                <option value="other">{{ __('Other') }}</option>
                            </select>
                            @error('organization_type')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="project_title" class="form-label">{{ __('Project Title') }}</label>
                            <input type="text" id="project_title" name="project_title" class="form-control" required maxlength="255" placeholder="{{ __('e.g., Coastal Resilience Initiative in Madagascar') }}">
                            @error('project_title')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="project_description" class="form-label">{{ __('Project Description') }}</label>
                            <textarea id="project_description" name="project_description" class="form-control" rows="5" required placeholder="{{ __('Describe the climate challenge, proposed solution, target beneficiaries, and expected outcomes.') }}"></textarea>
                            @error('project_description')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="message" class="form-label">{{ __('Additional Information') }}</label>
                            <textarea id="message" name="message" class="form-control" rows="4" placeholder="{{ __('Any specific support needed, timeline, or questions.') }}"></textarea>
                            @error('message')<div class="form-error">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">{{ __('Submit Application') }}</button>
                        <p class="form-note">{{ __('We will review your submission and respond within 10 business days.') }}</p>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
