@extends('dashboard.layouts.main')

@section('content')
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-12 p-4">
      @if (session()->has('success'))
        <p class="mb-5 rounded-md bg-green-100 px-6 py-5 text-green-800 border border-green-300">
            {{ session('success') }}
        </p> 
      @endif
    </div>
  </div>

  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-12 p-4">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($borrows->count())
                  @foreach ($borrows as $borrow)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                          <td class="px-6 py-4">
                              {{ $borrow->user->name }}
                          </td>
                          <td class="px-6 py-4">
                              {{ $borrow->book->name }}
                          </td>
                          <td class="px-6 py-4">
                              {{ $borrow->borrow_date->format('d F Y') }}
                          </td>
                          <td class="px-6 py-4">
                              {{ $borrow->due_date->format('d F Y') }}
                          </td>
                          <td class="px-6 py-4">
                                @if ($borrow->status == 'diajukan')
                                    <p class="p-1 bg-yellow-300 text-center rounded-sm capitalize text-gray-500">{{ $borrow->status }}</p>
                                @elseif ($borrow->status == 'dipinjam')
                                    <p class="p-1 bg-green-300 text-center rounded-sm capitalize text-gray-500">{{ $borrow->status }}</p>
                                @elseif ($borrow->status == 'dikembalikan')
                                    <p class="p-1 bg-blue-300 text-center rounded-sm capitalize text-gray-500">{{ $borrow->status }}</p>
                                @elseif ($borrow->status == 'ditolak')
                                    <p class="p-1 bg-red-300 text-center rounded-sm capitalize text-gray-500">{{ $borrow->status }}</p>
                                @endif
                          </td>
                          <td class="px-6 py-4 flex gap-2">
                                @if ($borrow->status == 'diajukan' || $borrow->status == 'dipinjam')
                                    <a class="text-yellow-500" href="/dashboard/borrow/{{ $borrow->id }}/edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @elseif ($borrow->status == 'ditolak' || $borrow->status == 'dikembalikan') 
                                    <form action="/dashboard/borrow/{{ $borrow->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:cursor-pointer"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                @endif
                          </td>
                      </tr> 
                  @endforeach
                @else
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td colspan="3" class="px-6 py-4 text-center text-white">
                        Belum ada data borrow.
                    </td>
                  </tr>
                @endif

            </tbody>
        </table>
        {{-- pagination --}}
        <div class="mt-6">
            {{ $borrows->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection	