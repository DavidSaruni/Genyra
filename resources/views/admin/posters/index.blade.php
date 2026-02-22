@extends('admin.layouts.app')

@section('title', 'Posters')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Poster Management</h3>
                <a href="{{ route('admin.posters.create') }}" 
                   class="px-4 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Poster
                </a>
            </div>
        </div>

        <!-- Posters List -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Preview
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($posters as $poster)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset($poster->image_path) }}" 
                                     alt="{{ $poster->title }}" 
                                     class="h-16 w-24 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $poster->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($poster->is_active)
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $poster->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.posters.edit', $poster->id) }}" 
                                       class="text-genyra-primary hover:text-genyra-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.posters.destroy', $poster->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this poster?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-image text-4xl mb-4 block text-gray-300"></i>
                                <p class="text-lg font-medium">No posters yet</p>
                                <p class="text-sm">Create your first poster to display on the website.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($posters->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $posters->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
