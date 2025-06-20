import { Star } from "lucide-react"
import Link from "next/link"

interface Movie {
  id: number
  title: string
  year: number
  rating: number
  quality: string
  poster: string
}

interface MovieCardProps {
  movie: Movie
}

export function MovieCard({ movie }: MovieCardProps) {
  return (
    <Link href={`/movie/${movie.id}`}>
      <div className="group cursor-pointer">
        <div className="relative overflow-hidden rounded-lg bg-gray-800">
          {/* Poster */}
          <img
            src={movie.poster || "/placeholder.svg"}
            alt={movie.title}
            className="w-full h-[300px] object-cover transition-transform duration-300 group-hover:scale-105"
          />

          {/* Overlay */}
          <div className="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300" />

          {/* Quality Badge */}
          <div className="absolute top-2 right-2 bg-yellow-400 text-black text-xs px-2 py-1 rounded font-semibold">
            {movie.quality.split(" | ")[0]}
          </div>

          {/* Rating */}
          <div className="absolute top-2 left-2 flex items-center gap-1 bg-black/70 px-2 py-1 rounded">
            <Star className="w-3 h-3 text-yellow-400 fill-current" />
            <span className="text-xs">{movie.rating}</span>
          </div>

          {/* Hover Content */}
          <div className="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div className="text-center">
              <div className="bg-yellow-400 text-black px-4 py-2 rounded-full font-semibold text-sm">Download Now</div>
            </div>
          </div>
        </div>

        {/* Movie Info */}
        <div className="mt-3">
          <h3 className="font-semibold text-sm leading-tight group-hover:text-yellow-400 transition-colors">
            {movie.title}
          </h3>
          <p className="text-gray-400 text-xs mt-1">{movie.year}</p>
        </div>
      </div>
    </Link>
  )
}
