@extends('layouts.base')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
        <div class="container mx-auto px-4 py-12">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent">
                    Tentang LaporLoka
                </h1>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Platform digital inovatif untuk membantu warga melaporkan masalah lingkungan 
                    dan membangun komunikasi yang efektif dengan pemerintah daerah.
                </p>
            </div>

            <!-- Mission & Vision -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Menciptakan jembatan komunikasi yang transparan antara masyarakat dan pemerintah 
                        untuk mewujudkan lingkungan yang lebih baik melalui teknologi digital yang mudah diakses.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="bg-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi platform pengaduan masyarakat terdepan yang mendorong partisipasi aktif 
                        warga dalam pembangunan dan pemeliharaan lingkungan yang berkelanjutan.
                    </p>
                </div>
            </div>

            <!-- Features -->
            <div class="bg-white p-12 rounded-3xl shadow-xl border border-gray-100 mb-16">
                <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Fitur Unggulan</h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Tracking</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Monitor status pengaduan secara langsung dengan notifikasi update terbaru
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-green-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Keamanan Data</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Sistem enkripsi tingkat tinggi untuk melindungi privasi dan data pengguna
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-purple-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2M7 4h10M7 4v16a2 2 0 002 2h6a2 2 0 002-2V4M10 9v6M14 9v6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Laporan Lengkap</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Dokumentasi lengkap dengan foto, lokasi GPS, dan kategori masalah yang jelas
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="text-center bg-gradient-to-r from-blue-600 to-green-600 p-12 rounded-3xl shadow-2xl text-white">
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-xl mb-8 text-blue-50">
                    Punya pertanyaan atau saran? Kami siap membantu Anda
                </p>
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2">Email</h4>
                        <p class="text-blue-50">support@laporloka.id</p>
                    </div>
                    <div>
                        <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2">Telepon</h4>
                        <p class="text-blue-50">+62 21 1234 5678</p>
                    </div>
                    <div>
                        <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2">Alamat</h4>
                        <p class="text-blue-50">Jakarta, Indonesia</p>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center bg-white text-blue-600 px-8 py-4 rounded-xl hover:bg-gray-50 transition-colors duration-200 font-bold text-lg shadow-lg">
                        Kembali ke Beranda
                        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection