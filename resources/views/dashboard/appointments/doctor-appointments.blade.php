@extends('dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="card-title mb-1">{{ __("Doctor's Appointments") }}</h5>
                        <p class="text-muted mb-0">{{ __('View and manage your appointments') }}</p>
                    </div>
                    @if(auth()->user()->hasRole('super-admin'))
                        <div class="col-md-3">
                            <form action="{{ route('doctor.appointments.index') }}" method="GET">
                                <select name="doctor_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">{{ __('All Doctors') }}</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row px-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border border-primary bg-white shadow-lg h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-primary p-3 mx-3"
                                style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-calendar-check text-white"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">
                                    {{ $appointmentDays->sum(function ($day) use ($appointmentsByDay) {return $appointmentsByDay[$day]->total();}) }}
                                </h3>
                                <p class="mb-0">{{ __('Total Appointments') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border border-success bg-white shadow-lg h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-success p-3 mx-3"
                                style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">{{ $availableAppointments }}</h3>
                                <p class="mb-0">{{ __('Available Slots') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border border-info bg-white shadow-lg h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-info p-3 mx-3"
                                style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user-clock text-white"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">{{ $bookedAppointments }}</h3>
                                <p class="mb-0">{{ __('Booked Appointments') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border border-warning bg-white shadow-lg h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-warning p-3 mx-3"
                                style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-exclamation-circle text-white"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">{{ $pendingAppointments }}</h3>
                                <p class="mb-0">{{ __('Pending Review') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Tabs -->
                @php
                    $today = \Carbon\Carbon::now();
                    $currentDay = $today->format('l');
                    $currentDate = $today->format('Y-m-d');
                @endphp
                
                <ul class="nav nav-tabs mb-3">
                    @foreach ($appointmentDays as $day)
                        <li class="nav-item">
                            <a class="nav-link {{ $day == $currentDay ? 'active' : '' }}" 
                               data-bs-toggle="tab"
                               href="#day-{{ $day }}"
                               data-date="{{ $currentDate }}">
                                {{ __($day) }}
                                @if($day == $currentDay)
                                    <span class="badge bg-success ms-1">{{ __('Today') }}</span>
                                @endif
                                <span class="badge bg-primary ms-1">
                                    {{ $appointmentsByDay[$day]->total() }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    @foreach ($appointmentDays as $day)
                        <div class="tab-pane fade {{ $day == $currentDay ? 'show active' : '' }}"
                            id="day-{{ $day }}">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Time') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Patient') }}</th>
                                            <th>{{ __('Doctor') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Notes') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointmentsByDay[$day] as $appointment)
                                            <tr class="appointment-row {{ $appointment->status }}">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="me-2 {{ \Carbon\Carbon::parse($appointment->start_time)->isPast() ? 'text-danger' : 'text-success' }}">
                                                            <i class="fas fa-circle fs-xs"></i>
                                                        </span>
                                                        <div>

                                                            <strong>{{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A')}}</strong>
                                                            <br>
                                                            <small
                                                                class="text-muted">{{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>

                                                        <strong>{{$appointment->day_of_week}}</strong>
                                                        <br>
                                                        <small
                                                            class="text-muted">{{$appointment->date }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @if ($appointment->patient)
                                                            <strong>{{ $appointment->patient->name }}</strong>
                                                            <br>
                                                            <small class="text-muted">{{ $appointment->patient->email }}</small>
                                                        @else
                                                            <span class="text-muted">{{ __('No patient assigned') }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @if (true)
                                                            <strong>{{\App\Models\User::where('id',$appointment->doctor_id)->first()->name  }}</strong>
                                                            <br>
                                                            <small class="text-muted">
                                                                
                                                                <br>
                                                                {{\App\Models\User::where('id',$appointment->doctor_id)->first()->email}}
                                                            </small>
                                                        @else
                                                            <span class="text-muted">{{ __('No doctor assigned') }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $appointment->status == 'confirmed' ? 'success' : ($appointment->status == 'cancelled' ? 'danger' : 'warning') }}">
                                                        {{ ucfirst($appointment->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ Str::limit($appointment->notes, 30) }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('doctor.appointments.show', $appointment->id) }}"
                                                            class="btn btn-light" title="{{ __('View Details') }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        @if ($appointment->status != 'cancelled')
                                                        @if ($appointment->patient_id)
                                                        <a href="{{ route('prescription.create', $appointment->id) }}"
                                                            class="btn btn-light"
                                                            title="{{ __('Create Prescription') }}">
                                                            <i class="fas fa-prescription"></i>
                                                        </a>
                                                        @endif

                                                            <form
                                                                action="{{ route('doctor.appointments.destroy', $appointment->id) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('{{ __('Are you sure you want to delete this appointment? This action cannot be undone.') }}')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    title="{{ __('Delete Appointment') }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-3">
                                                    {{ __('No appointments for this day') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if ($appointmentsByDay[$day]->hasPages())
                                <div class="p-3">
                                    {{ $appointmentsByDay[$day]->links() }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Remove this section as it's no longer needed -->
            {{-- @if ($appointments->hasPages())
                <div class="p-3">
                    {{ $appointments->links() }}
                </div>
            @endif --}}
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const today = new Date();
                const currentDay = today.toLocaleString('en-us', {weekday: 'long'});
                
                // Activate today's tab by default
                const todayTab = document.querySelector(`a[href="#day-${currentDay}"]`);
                if (todayTab) {
                    const tabTrigger = new bootstrap.Tab(todayTab);
                    tabTrigger.show();
                }

                // Store active tab when changed
                document.querySelectorAll('.nav-tabs .nav-link').forEach(link => {
                    link.addEventListener('shown.bs.tab', function(e) {
                        const day = e.target.getAttribute('href').replace('#day-', '');
                        localStorage.setItem('activeDay', day);
                        
                        // Update URL with the selected day
                        const url = new URL(window.location);
                        url.searchParams.set('day', day);
                        url.searchParams.set('date', e.target.dataset.date);
                        window.history.pushState({}, '', url);
                    });
                });
            });
        </script>
    @endpush

    @push('styles')
        <style>
            .fs-xs {
                font-size: 8px;
            }

            .appointment-row.cancelled {
                background-color: #fff5f5;
            }

            .appointment-row.confirmed {
                background-color: #f0fff4;
            }
        </style>
    @endpush
@endsection
