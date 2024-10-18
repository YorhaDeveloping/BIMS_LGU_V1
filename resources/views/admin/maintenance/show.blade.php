<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if ($maintenance)
                <h1>Maintenance Record</h1>
                <p>Building Name: {{ $maintenance->buildings_name }}</p>
                    <p class="text-xl">Maintenance Type: {{ $maintenance->maintenance_type }}</p>
                    <p class="text-xl">Issue Description: {{ $maintenance->issue_description }}</p>
                    <p class="text-xl">Priority: {{ $maintenance->priority }}</p>
                    <p class="text-xl">Submitter: {{ $maintenance->submitter_name }}</p>
                    <p class="text-xl">Submission Date: {{ $maintenance->submittion_date }}</p>
                    <p class="text-xl">Status: {{ $maintenance->status }}</p>
                @else
                    <p>No maintenance record found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
