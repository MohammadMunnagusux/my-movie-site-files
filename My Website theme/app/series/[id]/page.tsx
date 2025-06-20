import { Button } from "@/components/ui/button"
import { Star, Calendar, Tv, ArrowLeft, Download } from "lucide-react"
import Link from "next/link"
import { Logo } from "@/components/logo"

// Mock series data
const seriesData = {
  1: {
    id: 1,
    title: "Game of Thrones",
    year: "2011-2019",
    rating: 9.3,
    seasons: 8,
    episodes: 73,
    quality: "4K | 1080p | 720p",
    synopsis:
      "Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia. Based on the bestselling book series 'A Song of Ice and Fire' by George R.R. Martin.",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    genre: ["Drama", "Fantasy", "Adventure"],
    creator: "David Benioff, D.B. Weiss",
    cast: ["Emilia Clarke", "Kit Harington", "Peter Dinklage", "Lena Headey"],
    language: "Hindi | English",
    status: "Completed",
    seasonsData: [
      {
        season: 1,
        episodes: 10,
        year: 2011,
        episodes_list: Array.from({ length: 10 }, (_, i) => ({
          episode: i + 1,
          title: `Episode ${i + 1}`,
          duration: "55 min",
          size: {
            "4K": "2.1 GB",
            "1080p": "800 MB",
            "720p": "400 MB",
          },
        })),
      },
      {
        season: 2,
        episodes: 10,
        year: 2012,
        episodes_list: Array.from({ length: 10 }, (_, i) => ({
          episode: i + 1,
          title: `Episode ${i + 1}`,
          duration: "55 min",
          size: {
            "4K": "2.1 GB",
            "1080p": "800 MB",
            "720p": "400 MB",
          },
        })),
      },
      {
        season: 3,
        episodes: 10,
        year: 2013,
        episodes_list: Array.from({ length: 10 }, (_, i) => ({
          episode: i + 1,
          title: `Episode ${i + 1}`,
          duration: "55 min",
          size: {
            "4K": "2.1 GB",
            "1080p": "800 MB",
            "720p": "400 MB",
          },
        })),
      },
    ],
  },
}

export default function SeriesDetailsPage({ params }: { params: { id: string } }) {
  const series = seriesData[1] // In real app, use params.id

  if (!series) {
    return <div>Series not found</div>
  }

  return (
    <div className="min-h-screen bg-gray-900 text-white">
      {/* Header */}
      <header className="bg-black/50 backdrop-blur-sm sticky top-0 z-50">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <Link href="/">
              <Logo />
            </Link>
            <Link href="/series" className="flex items-center gap-2 hover:text-yellow-400 transition-colors">
              <ArrowLeft className="w-4 h-4" />
              Back to Series
            </Link>
          </div>
        </div>
      </header>

      {/* Series Hero */}
      <section
        className="relative h-[50vh] bg-cover bg-center bg-no-repeat"
        style={{ backgroundImage: `url(${series.backdrop})` }}
      >
        <div className="absolute inset-0 bg-black/70" />
        <div className="relative container mx-auto px-4 h-full flex items-end pb-8">
          <div>
            <h1 className="text-4xl md:text-5xl font-bold mb-4">{series.title}</h1>
            <div className="flex flex-wrap items-center gap-4 text-sm">
              <div className="flex items-center gap-1">
                <Star className="w-4 h-4 text-yellow-400 fill-current" />
                <span>{series.rating}</span>
              </div>
              <div className="flex items-center gap-1">
                <Calendar className="w-4 h-4" />
                <span>{series.year}</span>
              </div>
              <div className="flex items-center gap-1">
                <Tv className="w-4 h-4" />
                <span>
                  {series.seasons} Seasons • {series.episodes} Episodes
                </span>
              </div>
              <div
                className={`px-2 py-1 rounded text-xs font-semibold ${
                  series.status === "Completed" ? "bg-green-500" : "bg-blue-500"
                }`}
              >
                {series.status}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Series Details */}
      <section className="container mx-auto px-4 py-12">
        <div className="grid lg:grid-cols-3 gap-12">
          {/* Poster */}
          <div className="lg:col-span-1">
            <img
              src={series.poster || "/placeholder.svg"}
              alt={series.title}
              className="w-full max-w-sm mx-auto rounded-lg shadow-2xl"
            />
          </div>

          {/* Details */}
          <div className="lg:col-span-2 space-y-8">
            {/* Synopsis */}
            <div>
              <h2 className="text-2xl font-bold mb-4">Synopsis</h2>
              <p className="text-gray-300 leading-relaxed">{series.synopsis}</p>
            </div>

            {/* Series Info */}
            <div className="grid md:grid-cols-2 gap-6">
              <div>
                <h3 className="text-lg font-semibold mb-3">Series Details</h3>
                <div className="space-y-2 text-sm">
                  <div>
                    <span className="text-gray-400">Creator:</span> {series.creator}
                  </div>
                  <div>
                    <span className="text-gray-400">Genre:</span> {series.genre.join(", ")}
                  </div>
                  <div>
                    <span className="text-gray-400">Language:</span> {series.language}
                  </div>
                  <div>
                    <span className="text-gray-400">Quality:</span> {series.quality}
                  </div>
                  <div>
                    <span className="text-gray-400">Status:</span> {series.status}
                  </div>
                </div>
              </div>
              <div>
                <h3 className="text-lg font-semibold mb-3">Cast</h3>
                <div className="text-sm text-gray-300">{series.cast.join(", ")}</div>
              </div>
            </div>
          </div>
        </div>

        {/* Seasons & Episodes */}
        <div className="mt-16">
          <h2 className="text-3xl font-bold mb-8 text-center">Seasons & Episodes</h2>

          {series.seasonsData.map((seasonData) => (
            <div key={seasonData.season} className="mb-12">
              <div className="bg-gray-800 rounded-lg p-6">
                <h3 className="text-2xl font-bold mb-6 text-center text-yellow-400">
                  Season {seasonData.season} ({seasonData.year}) - {seasonData.episodes} Episodes
                </h3>

                <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                  {seasonData.episodes_list.map((episode) => (
                    <div key={episode.episode} className="bg-gray-700 rounded-lg p-4">
                      <div className="text-center mb-3">
                        <div className="text-lg font-bold">EP {episode.episode}</div>
                        <div className="text-xs text-gray-400">{episode.duration}</div>
                      </div>

                      <div className="space-y-2">
                        <Button size="sm" className="w-full bg-yellow-400 hover:bg-yellow-500 text-black text-xs">
                          <Download className="w-3 h-3 mr-1" />
                          4K ({episode.size["4K"]})
                        </Button>
                        <Button
                          size="sm"
                          variant="outline"
                          className="w-full text-xs border-gray-500 text-gray-300 hover:bg-gray-600"
                        >
                          <Download className="w-3 h-3 mr-1" />
                          1080p ({episode.size["1080p"]})
                        </Button>
                        <Button
                          size="sm"
                          variant="outline"
                          className="w-full text-xs border-gray-500 text-gray-300 hover:bg-gray-600"
                        >
                          <Download className="w-3 h-3 mr-1" />
                          720p ({episode.size["720p"]})
                        </Button>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Warning Notice */}
        <div className="bg-red-900/20 border border-red-500/30 rounded-lg p-4 mt-8">
          <p className="text-sm text-red-300">
            <strong>Disclaimer:</strong> This is for educational purposes only. Please support the creators by watching
            series through official platforms.
          </p>
        </div>
      </section>
    </div>
  )
}
