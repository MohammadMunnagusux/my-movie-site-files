export function Logo({ className = "" }: { className?: string }) {
  return (
    <div className={`flex items-center gap-2 ${className}`}>
      {/* Modern Logo Icon */}
      <div className="relative">
        <div className="w-8 h-8 bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 rounded-lg flex items-center justify-center shadow-lg">
          <div className="w-4 h-4 bg-white rounded-sm opacity-90 flex items-center justify-center">
            <div className="w-2 h-2 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full"></div>
          </div>
        </div>
        <div className="absolute -top-1 -right-1 w-3 h-3 bg-blue-500 rounded-full border-2 border-gray-900"></div>
      </div>

      {/* Modern Text Logo */}
      <div className="flex items-center">
        <span className="text-2xl font-bold bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent">
          Spectra
        </span>
        <span className="text-2xl font-bold text-white ml-1">Box</span>
        <div className="ml-1 px-2 py-0.5 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full">
          <span className="text-xs font-semibold text-white">HD</span>
        </div>
      </div>
    </div>
  )
}
