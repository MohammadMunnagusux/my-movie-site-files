import { Button } from "@/components/ui/button"
import { Star, Clock, Calendar, Download } from "lucide-react"

interface Movie {
  title: string
  year: number
  rating: number
  duration: string
  quality: string
  synopsis: string
  backdrop: string
  downloadLinks: {
    "4K": string
    "1080p": string
    "720p": string
  }
}

interface FeaturedMovieProps {
  movie: Movie
}

export function FeaturedMovie({ movie }: FeaturedMovieProps) {
  return (
    <section
      className="relative h-[70vh] bg-cover bg-center bg-no-repeat"
      style={{ backgroundImage: `url(${movie.backdrop})` }}
    >
      {/* Overlay */}
      <div className="absolute inset-0 bg-black/60" />

      {/* Content */}
      <div className="relative container mx-auto px-4 h-full flex items-center">
        <div className="max-w-2xl">
          {/* Title */}
          <h1 className="text-4xl md:text-6xl font-bold mb-4">{movie.title}</h1>

          {/* Movie Info */}
          <div className="flex flex-wrap items-center gap-4 mb-6 text-sm">
            <div className="flex items-center gap-1">
              <Star className="w-4 h-4 text-yellow-400 fill-current" />
              <span>{movie.rating}</span>
            </div>
            <div className="flex items-center gap-1">
              <Calendar className="w-4 h-4" />
              <span>{movie.year}</span>
            </div>
            <div className="flex items-center gap-1">
              <Clock className="w-4 h-4" />
              <span>{movie.duration}</span>
            </div>
            <div className="bg-yellow-400 text-black px-2 py-1 rounded text-xs font-semibold">{movie.quality}</div>
          </div>

          {/* Synopsis */}
          <p className="text-lg mb-8 leading-relaxed opacity-90">{movie.synopsis}</p>

          {/* Download Buttons */}
          <div className="flex flex-wrap gap-3">
            <Button className="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold">
              <Download className="w-4 h-4 mr-2" />
              Download 4K
            </Button>
            <Button variant="outline" className="border-white text-white hover:bg-white hover:text-black">
              <Download className="w-4 h-4 mr-2" />
              Download 1080p
            </Button>
            <Button variant="outline" className="border-white text-white hover:bg-white hover:text-black">
              <Download className="w-4 h-4 mr-2" />
              Download 720p
            </Button>
          </div>
        </div>
      </div>
    </section>
  )
}
