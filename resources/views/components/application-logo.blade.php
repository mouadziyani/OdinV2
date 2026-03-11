<div {{ $attributes->merge(['class' => 'relative flex items-center justify-center']) }}>
    <div class="absolute inset-0 bg-blue-500/20 blur-2xl rounded-full"></div>
    
    <svg viewBox="0 0 100 100" class="w-full h-full relative z-10" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="odinGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#2563eb;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#4f46e5;stop-opacity:1" />
            </linearGradient>
        </defs>
        
        <path d="M50 10 L15 30 L15 70 L50 90 L85 70 L85 30 Z" 
              fill="none" 
              stroke="url(#odinGradient)" 
              stroke-width="8" 
              stroke-linejoin="round" />
              
        <path d="M50 25 L30 38 L30 62 L50 75 L70 62 L70 38 Z" 
              fill="url(#odinGradient)" />
              
        <circle cx="50" cy="50" r="5" fill="white" class="animate-pulse" />
    </svg>
</div>