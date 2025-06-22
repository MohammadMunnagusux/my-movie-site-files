import Link from "next/link"
import Image from "next/image"
import { ArrowLeft, Download, Star, Calendar, Share2, Eye, Play, Clock, Zap, Heart } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"

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
  trailer: "https://www.youtube.com/embed/dQw4w9WgXcQ",
  downloads: [
    {
      quality: "2160p 4K UHD",
      size: "8.5 GB",
      format: "x265 HEVC HDR",
      audio: "Multi Audio (Hindi-English-Tamil-Telugu)",
      subtitles: "ESubs",
      type: "WEB-DL",
      downloadLinks: [
        { server: "Google Drive", url: "#", premium: false },
        { server: "Mega", url: "#", premium: false },
        { server: "MediaFire", url: "#", premium: true },
      ],
    },
    {
      quality: "1080p FHD",
      size: "4.2 GB",
      format: "x264 BluRay",
      audio: "Dual Audio (Hindi-English)",
      subtitles: "ESubs",
      type: "BluRay",
      downloadLinks: [
        { server: "Google Drive", url: "#", premium: false },
        { server: "Mega", url: "#", premium: false },
        { server: "Torrent", url: "#", premium: false },
      ],
    },
    {
      quality: "720p HD",
      size: "1.8 GB",
      format: "x264 WEB-DL",
      audio: "Dual Audio (Hindi-English)",
      subtitles: "ESubs",
      type: "WEB-DL",
      downloadLinks: [
        { server: "Google Drive", url: "#", premium: false },
        { server: "MediaFire", url: "#", premium: false },
      ],
    },
  ],
  tags: ["Horror", "Thriller", "2025", "Multi Audio", "4K UHD", "1080p", "720p", "English", "Hindi"],
  views: "127,892",
  likes: "8,234",
  publishDate: "December 15, 2024",
  imdbRating: 7.2,
  rottenTomatoes: 68,
}

const relatedMovies = [
  {
    id: 2,
    title: "Final Destination 5",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "1080p",
    year: "2011",
    rating: 5.9,
  },
  {
    id: 3,
    title: "The Final Destination",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "4K",
    year: "2009",
    rating: 5.2,
  },
  {
    id: 4,
    title: "Final Destination 3",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "1080p",
    year: "2006",
    rating: 5.8,
  },
  {
    id: 5,
    title: "Final Destination 2",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "1080p",
    year: "2003",
    rating: 6.2,
  },
]

export default function MoviePage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
      {/* Header */}
      <header className="bg-black/20 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
        <div className="container mx-auto px-4">
          <div className="flex items-center justify-between h-16">
            <Link href="/" className="flex items-center space-x-3">
              <div className="bg-gradient-to-r from-purple-500 via-blue-500 to-cyan-500 p-2 rounded-xl">
                <Zap className="w-6 h-6 text-white" />
              </div>
              <span className="text-2xl font-bold bg-gradient-to-r from-purple-400 via-blue-400 to-cyan-400 bg-clip-text text-transparent">
                SpectraBox
              </span>
            </Link>

            <div className="flex items-center space-x-4">
              <Link href="/" className="flex items-center text-gray-300 hover:text-white transition-colors">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Back to Home
              </Link>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent z-10"></div>
        <Image
          src={movieData.backdrop || "/placeholder.svg"}
          alt={movieData.title}
          fill
          className="object-cover opacity-40"
        />
        <div className="relative z-20 container mx-auto px-4 py-16">
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div className="lg:col-span-1">
              <div className="relative group">
                <Image
                  src={movieData.poster || "/placeholder.svg"}
                  alt={movieData.title}
                  width={400}
                  height={600}
                  className="w-full max-w-sm mx-auto rounded-2xl shadow-2xl group-hover:scale-105 transition-transform duration-300"
                />
                <div className="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 rounded-2xl flex items-center justify-center">
                  <Button className="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/20 backdrop-blur-md text-white border-white/30">
                    <Play className="w-5 h-5 mr-2" />
                    Watch Trailer
                  </Button>
                </div>
              </div>
            </div>

            <div className="lg:col-span-2">
              <div className="flex flex-wrap gap-2 mb-4">
                {movieData.tags.slice(0, 6).map((tag) => (
                  <Badge
                    key={tag}
                    className="bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-purple-300 border-purple-500/30"
                  >
                    {tag}
                  </Badge>
                ))}
              </div>

              <h1 className="text-4xl md:text-6xl font-bold text-white mb-4 leading-tight">{movieData.title}</h1>
              <p className="text-xl text-gray-300 mb-6 leading-relaxed">{movieData.plot}</p>

              <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Star className="w-5 h-5 fill-yellow-400 text-yellow-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{movieData.rating}</div>
                  <div className="text-xs text-gray-400">IMDb Rating</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Calendar className="w-5 h-5 text-blue-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{movieData.year}</div>
                  <div className="text-xs text-gray-400">Release Year</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Clock className="w-5 h-5 text-green-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{movieData.duration}</div>
                  <div className="text-xs text-gray-400">Duration</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Eye className="w-5 h-5 text-purple-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{movieData.views}</div>
                  <div className="text-xs text-gray-400">Views</div>
                </div>
              </div>

              <div className="flex items-center space-x-4 mb-8">
                <Button
                  size="lg"
                  className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8"
                >
                  <Download className="w-5 h-5 mr-2" />
                  Download Now
                </Button>
                <Button size="lg" variant="outline" className="border-white/30 text-white hover:bg-white/10">
                  <Play className="w-5 h-5 mr-2" />
                  Watch Trailer
                </Button>
                <Button size="lg" variant="ghost" className="text-white hover:bg-white/10">
                  <Heart className="w-5 h-5" />
                </Button>
                <Button size="lg" variant="ghost" className="text-white hover:bg-white/10">
                  <Share2 className="w-5 h-5" />
                </Button>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                  <h4 className="font-semibold text-white mb-2">Director</h4>
                  <p className="text-gray-300">{movieData.director}</p>
                </div>
                <div>
                  <h4 className="font-semibold text-white mb-2">Genre</h4>
                  <p className="text-gray-300">{movieData.genre.join(", ")}</p>
                </div>
                <div className="md:col-span-2">
                  <h4 className="font-semibold text-white mb-2">Cast</h4>
                  <div className="flex flex-wrap gap-2">
                    {movieData.cast.map((actor) => (
                      <Badge key={actor} variant="secondary" className="bg-white/10 text-gray-300 border-0">
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

      <div className="container mx-auto px-4 py-12">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-8">
          {/* Main Content */}
          <div className="lg:col-span-3">
            {/* Download Section */}
            <Card className="mb-8 bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-8">
                <h2 className="text-3xl font-bold text-white mb-6 flex items-center">
                  <Download className="w-8 h-8 mr-3 text-purple-400" />
                  Download {movieData.title} ({movieData.year})
                </h2>

                <Tabs defaultValue="all" className="w-full">
                  <TabsList className="grid w-full grid-cols-4 bg-white/10 border-white/20">
                    <TabsTrigger
                      value="all"
                      className="data-[state=active]:bg-purple-600 data-[state=active]:text-white"
                    >
                      All Qualities
                    </TabsTrigger>
                    <TabsTrigger
                      value="4k"
                      className="data-[state=active]:bg-purple-600 data-[state=active]:text-white"
                    >
                      4K UHD
                    </TabsTrigger>
                    <TabsTrigger
                      value="1080p"
                      className="data-[state=active]:bg-purple-600 data-[state=active]:text-white"
                    >
                      1080p
                    </TabsTrigger>
                    <TabsTrigger
                      value="720p"
                      className="data-[state=active]:bg-purple-600 data-[state=active]:text-white"
                    >
                      720p
                    </TabsTrigger>
                  </TabsList>

                  <TabsContent value="all" className="mt-6">
                    <div className="space-y-6">
                      {movieData.downloads.map((download, index) => (
                        <DownloadCard key={index} download={download} movieTitle={movieData.title} />
                      ))}
                    </div>
                  </TabsContent>

                  <TabsContent value="4k" className="mt-6">
                    <div className="space-y-6">
                      {movieData.downloads
                        .filter((d) => d.quality.includes("2160p"))
                        .map((download, index) => (
                          <DownloadCard key={index} download={download} movieTitle={movieData.title} />
                        ))}
                    </div>
                  </TabsContent>

                  <TabsContent value="1080p" className="mt-6">
                    <div className="space-y-6">
                      {movieData.downloads
                        .filter((d) => d.quality.includes("1080p"))
                        .map((download, index) => (
                          <DownloadCard key={index} download={download} movieTitle={movieData.title} />
                        ))}
                    </div>
                  </TabsContent>

                  <TabsContent value="720p" className="mt-6">
                    <div className="space-y-6">
                      {movieData.downloads
                        .filter((d) => d.quality.includes("720p"))
                        .map((download, index) => (
                          <DownloadCard key={index} download={download} movieTitle={movieData.title} />
                        ))}
                    </div>
                  </TabsContent>
                </Tabs>
              </CardContent>
            </Card>

            {/* Related Movies */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-8">
                <h3 className="text-2xl font-bold text-white mb-6">Related Movies</h3>
                <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                  {relatedMovies.map((movie) => (
                    <Link key={movie.id} href={`/movie/${movie.id}`} className="group">
                      <div className="relative">
                        <Image
                          src={movie.poster || "/placeholder.svg"}
                          alt={movie.title}
                          width={200}
                          height={300}
                          className="w-full h-48 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300"
                        />
                        <Badge className="absolute top-2 left-2 bg-green-500/80 text-white text-xs">
                          {movie.quality}
                        </Badge>
                        <div className="absolute top-2 right-2 flex items-center space-x-1 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
                          <Star className="w-3 h-3 fill-yellow-400 text-yellow-400" />
                          <span>{movie.rating}</span>
                        </div>
                      </div>
                      <h4 className="font-semibold text-white mt-2 group-hover:text-purple-400 transition-colors text-sm">
                        {movie.title} ({movie.year})
                      </h4>
                    </Link>
                  ))}
                </div>
              </CardContent>
            </Card>
          </div>

          {/* Sidebar */}
          <div className="space-y-6">
            {/* Quick Search */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Quick Search</h3>
                <Input
                  placeholder="Search movies..."
                  className="bg-white/10 border-white/20 text-white placeholder:text-gray-400 mb-4"
                />
                <Button className="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white">
                  Search
                </Button>
              </CardContent>
            </Card>

            {/* Movie Stats */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Movie Stats</h3>
                <div className="space-y-4">
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Views</span>
                    <span className="text-white font-semibold">{movieData.views}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Likes</span>
                    <span className="text-white font-semibold">{movieData.likes}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Published</span>
                    <span className="text-white font-semibold">{movieData.publishDate}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">IMDb</span>
                    <span className="text-white font-semibold">{movieData.imdbRating}/10</span>
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Popular Tags */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Popular Tags</h3>
                <div className="flex flex-wrap gap-2">
                  {movieData.tags.map((tag) => (
                    <Badge
                      key={tag}
                      variant="secondary"
                      className="cursor-pointer hover:bg-purple-500/20 hover:text-purple-300 transition-colors bg-white/10 text-gray-300 border-0 text-xs"
                    >
                      {tag}
                    </Badge>
                  ))}
                </div>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </div>
  )
}

function DownloadCard({ download, movieTitle }: { download: any; movieTitle: string }) {
  return (
    <div className="border border-white/20 rounded-xl p-6 bg-gradient-to-r from-white/5 to-white/10 backdrop-blur-sm hover:from-white/10 hover:to-white/15 transition-all duration-300">
      <div className="flex items-start justify-between mb-4">
        <div>
          <h4 className="text-xl font-bold text-white mb-2">
            {movieTitle} ({download.quality})
          </h4>
          <div className="flex items-center space-x-4 text-sm text-gray-300">
            <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0">
              {download.quality}
            </Badge>
            <Badge className="bg-gradient-to-r from-blue-500 to-cyan-500 text-white border-0">{download.type}</Badge>
          </div>
        </div>
        <div className="text-right">
          <div className="text-2xl font-bold text-white">{download.size}</div>
          <div className="text-xs text-gray-400">File Size</div>
        </div>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 text-sm">
        <div>
          <span className="text-gray-400 block mb-1">Format:</span>
          <span className="text-white font-semibold">{download.format}</span>
        </div>
        <div>
          <span className="text-gray-400 block mb-1">Audio:</span>
          <span className="text-white font-semibold">{download.audio}</span>
        </div>
        <div>
          <span className="text-gray-400 block mb-1">Subtitles:</span>
          <span className="text-white font-semibold">{download.subtitles}</span>
        </div>
      </div>

      <div className="space-y-3">
        <h5 className="font-semibold text-white">Download Links:</h5>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
          {download.downloadLinks.map((link: any, index: number) => (
            <Button
              key={index}
              className={`w-full justify-between ${
                link.premium
                  ? "bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700"
                  : "bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700"
              } text-white`}
            >
              <span className="flex items-center">
                <Download className="w-4 h-4 mr-2" />
                {link.server}
              </span>
              {link.premium && <Badge className="bg-yellow-500 text-black text-xs">PRO</Badge>}
            </Button>
          ))}
        </div>
      </div>
    </div>
  )
}
