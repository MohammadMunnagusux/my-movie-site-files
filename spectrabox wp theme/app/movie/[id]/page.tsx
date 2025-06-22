import Link from "next/link"
import Image from "next/image"
import { ArrowLeft, Download, Star, Calendar, Eye, Play, Heart, Sparkles } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"

const movieData = {
  id: 1,
  title: "Final Destination Bloodlines",
  year: "2025",
  poster: "/placeholder.svg?height=800&width=600",
  backdrop: "/placeholder.svg?height=600&width=1200",
  rating: 7.2,
  duration: "108 min",
  genre: ["Horror", "Thriller", "Supernatural"],
  director: "Zach Lipovsky",
  cast: ["Tony Todd", "Devon Sawa", "Ali Larter", "Seann William Scott"],
  plot: "Death returns with a vengeance in this latest installment of the Final Destination franchise. When a group of friends escape a deadly accident, they soon discover that death has other plans for them. With more elaborate and terrifying death sequences than ever before, Bloodlines pushes the boundaries of the franchise to new heights.",
  downloads: [
    {
      quality: "2160p 4K UHD",
      size: "8.5 GB",
      format: "x265 HEVC HDR",
      audio: "Multi Audio (Hindi-English-Tamil-Telugu)",
      subtitles: "ESubs",
      type: "WEB-DL",
    },
    {
      quality: "1080p FHD",
      size: "4.2 GB",
      format: "x264 BluRay",
      audio: "Dual Audio (Hindi-English)",
      subtitles: "ESubs",
      type: "BluRay",
    },
    {
      quality: "720p HD",
      size: "1.8 GB",
      format: "x264 WEB-DL",
      audio: "Dual Audio (Hindi-English)",
      subtitles: "ESubs",
      type: "WEB-DL",
    },
  ],
  views: "127,892",
  likes: "8,234",
  publishDate: "December 15, 2024",
}

export default function MoviePage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900">
      {/* Animated Background */}
      <div className="fixed inset-0 overflow-hidden pointer-events-none">
        <div className="absolute -top-40 -right-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div className="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
      </div>

      {/* Header */}
      <header className="relative z-50 bg-black/30 backdrop-blur-xl border-b border-white/10">
        <div className="max-w-7xl mx-auto px-6">
          <div className="flex items-center justify-between h-20">
            <Link href="/" className="flex items-center space-x-4">
              <div className="bg-gradient-to-r from-purple-600 to-cyan-600 p-3 rounded-2xl">
                <Sparkles className="w-8 h-8 text-white" />
              </div>
              <div>
                <h1 className="text-3xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                  SpectraBox
                </h1>
                <p className="text-xs text-gray-400 font-medium tracking-wider">PREMIUM DOWNLOADS</p>
              </div>
            </Link>

            <Link href="/" className="flex items-center text-gray-300 hover:text-white transition-colors">
              <ArrowLeft className="w-5 h-5 mr-2" />
              Back to Home
            </Link>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="relative overflow-hidden py-20">
        <div className="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent"></div>
        <Image
          src={movieData.backdrop || "/placeholder.svg"}
          alt={movieData.title}
          fill
          className="object-cover opacity-30"
        />
        <div className="relative z-10 max-w-7xl mx-auto px-6">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
              <Image
                src={movieData.poster || "/placeholder.svg"}
                alt={movieData.title}
                width={400}
                height={600}
                className="w-full max-w-md mx-auto rounded-3xl shadow-2xl"
              />
            </div>

            <div>
              <div className="flex flex-wrap gap-3 mb-6">
                <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0 px-4 py-2">
                  Featured Movie
                </Badge>
                <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0 px-4 py-2">
                  4K Available
                </Badge>
              </div>

              <h1 className="text-5xl font-black text-white mb-4 leading-tight">{movieData.title}</h1>
              <p className="text-xl text-gray-300 mb-8 leading-relaxed">{movieData.plot}</p>

              <div className="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div className="text-center p-4 bg-white/10 rounded-2xl backdrop-blur-sm">
                  <Star className="w-6 h-6 fill-yellow-400 text-yellow-400 mx-auto mb-2" />
                  <div className="text-2xl font-bold text-white">{movieData.rating}</div>
                  <div className="text-xs text-gray-400">Rating</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-2xl backdrop-blur-sm">
                  <Calendar className="w-6 h-6 text-blue-400 mx-auto mb-2" />
                  <div className="text-2xl font-bold text-white">{movieData.year}</div>
                  <div className="text-xs text-gray-400">Year</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-2xl backdrop-blur-sm">
                  <Eye className="w-6 h-6 text-purple-400 mx-auto mb-2" />
                  <div className="text-2xl font-bold text-white">{movieData.views}</div>
                  <div className="text-xs text-gray-400">Views</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-2xl backdrop-blur-sm">
                  <Heart className="w-6 h-6 text-pink-400 mx-auto mb-2" />
                  <div className="text-2xl font-bold text-white">{movieData.likes}</div>
                  <div className="text-xs text-gray-400">Likes</div>
                </div>
              </div>

              <div className="flex items-center space-x-4 mb-8">
                <Button
                  size="lg"
                  className="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-700 hover:to-cyan-700 text-white px-8 py-4 rounded-full text-lg font-semibold"
                >
                  <Download className="w-5 h-5 mr-2" />
                  Download Now
                </Button>
                <Button
                  size="lg"
                  variant="outline"
                  className="border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-full text-lg font-semibold"
                >
                  <Play className="w-5 h-5 mr-2" />
                  Watch Trailer
                </Button>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                  <h4 className="font-bold text-white mb-2">Director</h4>
                  <p className="text-gray-300">{movieData.director}</p>
                </div>
                <div>
                  <h4 className="font-bold text-white mb-2">Genre</h4>
                  <p className="text-gray-300">{movieData.genre.join(", ")}</p>
                </div>
                <div className="md:col-span-2">
                  <h4 className="font-bold text-white mb-3">Cast</h4>
                  <div className="flex flex-wrap gap-2">
                    {movieData.cast.map((actor) => (
                      <Badge
                        key={actor}
                        className="bg-white/10 text-gray-300 border-0 hover:bg-purple-500/20 hover:text-purple-300 transition-colors cursor-pointer"
                      >
                        {actor}
                      </Badge>
                    ))}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Download Section - Centered */}
      <section className="py-20">
        <div className="max-w-5xl mx-auto px-6">
          <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
            <CardContent className="p-12">
              <h2 className="text-4xl font-black text-white mb-8 text-center">
                Download {movieData.title} ({movieData.year})
              </h2>

              <div className="space-y-8">
                {movieData.downloads.map((download, index) => (
                  <div
                    key={index}
                    className="border border-white/20 rounded-2xl p-8 bg-gradient-to-r from-white/5 to-white/10 backdrop-blur-sm hover:from-white/10 hover:to-white/15 transition-all duration-300"
                  >
                    <div className="flex items-start justify-between mb-6">
                      <div>
                        <h4 className="text-2xl font-bold text-white mb-3">
                          {movieData.title} ({download.quality})
                        </h4>
                        <div className="flex items-center space-x-4">
                          <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0 px-4 py-2">
                            {download.quality}
                          </Badge>
                          <Badge className="bg-gradient-to-r from-blue-500 to-cyan-500 text-white border-0 px-4 py-2">
                            {download.type}
                          </Badge>
                        </div>
                      </div>
                      <div className="text-right">
                        <div className="text-3xl font-black text-white">{download.size}</div>
                        <div className="text-sm text-gray-400">File Size</div>
                      </div>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                      <div>
                        <span className="text-gray-400 block mb-2 font-medium">Format:</span>
                        <span className="text-white font-bold text-lg">{download.format}</span>
                      </div>
                      <div>
                        <span className="text-gray-400 block mb-2 font-medium">Audio:</span>
                        <span className="text-white font-bold text-lg">{download.audio}</span>
                      </div>
                      <div>
                        <span className="text-gray-400 block mb-2 font-medium">Subtitles:</span>
                        <span className="text-white font-bold text-lg">{download.subtitles}</span>
                      </div>
                    </div>

                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                      <Button className="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-4 rounded-full font-semibold">
                        <Download className="w-5 h-5 mr-2" />
                        Google Drive
                      </Button>
                      <Button className="w-full bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white py-4 rounded-full font-semibold">
                        <Download className="w-5 h-5 mr-2" />
                        Mega
                      </Button>
                      <Button className="w-full bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white py-4 rounded-full font-semibold">
                        <Download className="w-5 h-5 mr-2" />
                        MediaFire
                      </Button>
                    </div>
                  </div>
                ))}
              </div>
            </CardContent>
          </Card>
        </div>
      </section>
    </div>
  )
}
