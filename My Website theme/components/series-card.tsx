import { Star, Tv } from "lucide-react"
import Link from "next/link"

interface Series {
  id: number
  title: string
  year: string
  rating: number
  seasons: number
  episodes: number
  quality: string
  poster: string
  status: string
}

interface SeriesCardProps {
  series: Series
}

export function SeriesCard({ series }: SeriesCardProps) {
  return (
    <Link href={`/series/${series.id}`}>
      <div className="group cursor-pointer">
        <div className="relative overflow-hidden rounded-lg bg-gray-800">
          {/* Poster */}
          <img
            src={series.poster || "/placeholder.svg"}
            alt={series.title}
            className="w-full h-[300px] object-cover transition-transform duration-300 group-hover:scale-105"
          />

          {/* Overlay */}
          <div className="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300" />

          {/* Status Badge */}
          <div
            className={`absolute top-2 right-2 text-xs px-2 py-1 rounded font-semibold ${
              series.status === "Completed" ? "bg-green-500 text-white" : "bg-blue-500 text-white"
            }`}
          >
            {series.status}
          </div>

          {/* Rating */}
          <div className="absolute top-2 left-2 flex items-center gap-1 bg-black/70 px-2 py-1 rounded">
            <Star className="w-3 h-3 text-yellow-400 fill-current" />
            <span className="text-xs">{series.rating}</span>
          </div>

          {/* Season/Episode Info */}
          <div className="absolute bottom-2 left-2 flex items-center gap-1 bg-black/70 px-2 py-1 rounded">
            <Tv className="w-3 h-3" />
            <span className="text-xs">
              {series.seasons}S • {series.episodes}E
            </span>
          </div>

          {/* Hover Content */}
          <div className="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div className="text-center">
              <div className="bg-yellow-400 text-black px-4 py-2 rounded-full font-semibold text-sm">View Series</div>
            </div>
          </div>
        </div>

        {/* Series Info */}
        <div className="mt-3">
          <h3 className="font-semibold text-sm leading-tight group-hover:text-yellow-400 transition-colors">
            {series.title}
          </h3>
          <p className="text-gray-400 text-xs mt-1">{series.year}</p>
        </div>
      </div>
    </Link>
  )
}
