export function LogoSmall({ className = "" }: { className?: string }) {
  return (
    <div className={`flex items-center gap-1.5 ${className}`}>
      {/* Small Logo Icon */}
      <div className="relative">
        <div className="w-6 h-6 bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 rounded-md flex items-center justify-center shadow-md">
          <div className="w-3 h-3 bg-white rounded-sm opacity-90 flex items-center justify-center">
            <div className="w-1.5 h-1.5 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full"></div>
          </div>
        </div>
        <div className="absolute -top-0.5 -right-0.5 w-2 h-2 bg-blue-500 rounded-full border border-gray-900"></div>
      </div>

      {/* Small Text Logo */}
      <div className="flex items-center">
        <span className="text-lg font-bold bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent">
          Spectra
        </span>
        <span className="text-lg font-bold text-white">Box</span>
      </div>
    </div>
  )
}
