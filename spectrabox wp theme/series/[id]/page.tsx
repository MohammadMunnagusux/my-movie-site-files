import Link from "next/link"
import Image from "next/image"
import { ArrowLeft, Download, Star, Calendar, Share2, Eye, Play, Zap, Heart, Tv } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from "@/components/ui/accordion"

const seriesData = {
  id: 1,
  title: "Peaky Blinders",
  subtitle: "Season 1-6 [Complete Series]",
  year: "2013-2022",
  poster: "/placeholder.svg?height=800&width=600",
  backdrop: "/placeholder.svg?height=600&width=1200",
  rating: 8.8,
  seasons: 6,
  totalEpisodes: 36,
  genre: ["Crime", "Drama", "History"],
  creator: "Steven Knight",
  cast: ["Cillian Murphy", "Paul Anderson", "Helen McCrory", "Sophie Rundle", "Finn Cole"],
  plot: "A gangster family epic set in 1900s England, centering on a gang who sew razor blades in the peaks of their caps, and their fierce boss Tommy Shelby. The story follows the exploits of the Shelby crime family in the direct aftermath of the First World War.",
  trailer: "https://www.youtube.com/embed/dQw4w9WgXcQ",
  seasonsData: [
    {
      season: 1,
      episodes: 6,
      year: "2013",
      description: "Thomas Shelby and his brothers return from WWI and build their criminal empire in Birmingham.",
      downloads: [
        {
          quality: "1080p FHD",
          size: "8.5 GB",
          format: "x264 BluRay",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "720p HD",
          size: "4.2 GB",
          format: "x264 WEB-DL",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
    {
      season: 2,
      episodes: 6,
      year: "2014",
      description: "The Peaky Blinders expand their territory and face new enemies from London.",
      downloads: [
        {
          quality: "1080p FHD",
          size: "9.1 GB",
          format: "x264 BluRay",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "720p HD",
          size: "4.8 GB",
          format: "x264 WEB-DL",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
    {
      season: 3,
      episodes: 6,
      year: "2016",
      description: "Tommy's political ambitions grow as the family faces threats from the Russian aristocracy.",
      downloads: [
        {
          quality: "1080p FHD",
          size: "8.8 GB",
          format: "x264 BluRay",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "720p HD",
          size: "4.5 GB",
          format: "x264 WEB-DL",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
    {
      season: 4,
      episodes: 6,
      year: "2017",
      description: "The Shelbys face their most dangerous enemy yet in the form of Luca Changretta.",
      downloads: [
        {
          quality: "2160p 4K UHD",
          size: "15.2 GB",
          format: "x265 HEVC BluRay",
          audio: "Multi Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "1080p FHD",
          size: "9.3 GB",
          format: "x264 BluRay",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
    {
      season: 5,
      episodes: 6,
      year: "2019",
      description: "Tommy enters the world of politics while dealing with personal demons and family betrayal.",
      downloads: [
        {
          quality: "2160p 4K UHD",
          size: "16.8 GB",
          format: "x265 HEVC BluRay",
          audio: "Multi Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "1080p FHD",
          size: "10.1 GB",
          format: "x264 BluRay",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
    {
      season: 6,
      episodes: 6,
      year: "2022",
      description:
        "The final season sees Tommy facing his ultimate challenge as the family legacy hangs in the balance.",
      downloads: [
        {
          quality: "2160p 4K UHD",
          size: "18.5 GB",
          format: "x265 HEVC WEB-DL",
          audio: "Multi Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
        {
          quality: "1080p FHD",
          size: "11.2 GB",
          format: "x264 WEB-DL",
          audio: "Dual Audio (Hindi-English)",
          subtitles: "ESubs",
          episodes: "Complete Season (6 Episodes)",
        },
      ],
    },
  ],
  tags: ["Crime", "Drama", "History", "Complete Series", "Multi Audio", "4K UHD", "1080p", "720p", "English", "Hindi"],
  views: "2,847,392",
  likes: "45,234",
  publishDate: "June 18, 2023",
  imdbRating: 8.8,
  rottenTomatoes: 93,
}

const relatedSeries = [
  {
    id: 2,
    title: "Breaking Bad",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "4K UHD",
    year: "2008-2013",
    rating: 9.5,
    seasons: 5,
  },
  {
    id: 3,
    title: "Narcos",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "1080p",
    year: "2015-2017",
    rating: 8.8,
    seasons: 3,
  },
  {
    id: 4,
    title: "Money Heist",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "4K UHD",
    year: "2017-2021",
    rating: 8.3,
    seasons: 5,
  },
  {
    id: 5,
    title: "Ozark",
    poster: "/placeholder.svg?height=400&width=300",
    quality: "1080p",
    year: "2017-2022",
    rating: 8.4,
    seasons: 4,
  },
]

export default function SeriesPage() {
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
          src={seriesData.backdrop || "/placeholder.svg"}
          alt={seriesData.title}
          fill
          className="object-cover opacity-40"
        />
        <div className="relative z-20 container mx-auto px-4 py-16">
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div className="lg:col-span-1">
              <div className="relative group">
                <Image
                  src={seriesData.poster || "/placeholder.svg"}
                  alt={seriesData.title}
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
                <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0">
                  <Tv className="w-3 h-3 mr-1" />
                  TV Series
                </Badge>
                <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0">
                  Complete Series
                </Badge>
                {seriesData.tags.slice(0, 4).map((tag) => (
                  <Badge
                    key={tag}
                    className="bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-purple-300 border-purple-500/30"
                  >
                    {tag}
                  </Badge>
                ))}
              </div>

              <h1 className="text-4xl md:text-6xl font-bold text-white mb-2 leading-tight">{seriesData.title}</h1>
              <p className="text-xl text-gray-400 mb-4">{seriesData.subtitle}</p>
              <p className="text-lg text-gray-300 mb-6 leading-relaxed">{seriesData.plot}</p>

              <div className="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Star className="w-5 h-5 fill-yellow-400 text-yellow-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{seriesData.rating}</div>
                  <div className="text-xs text-gray-400">IMDb Rating</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Calendar className="w-5 h-5 text-blue-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{seriesData.year}</div>
                  <div className="text-xs text-gray-400">Years</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Tv className="w-5 h-5 text-green-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{seriesData.seasons}</div>
                  <div className="text-xs text-gray-400">Seasons</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Play className="w-5 h-5 text-purple-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{seriesData.totalEpisodes}</div>
                  <div className="text-xs text-gray-400">Episodes</div>
                </div>
                <div className="text-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                  <div className="flex items-center justify-center mb-2">
                    <Eye className="w-5 h-5 text-cyan-400" />
                  </div>
                  <div className="text-2xl font-bold text-white">{seriesData.views}</div>
                  <div className="text-xs text-gray-400">Views</div>
                </div>
              </div>

              <div className="flex items-center space-x-4 mb-8">
                <Button
                  size="lg"
                  className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8"
                >
                  <Download className="w-5 h-5 mr-2" />
                  Download Complete Series
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
                  <h4 className="font-semibold text-white mb-2">Creator</h4>
                  <p className="text-gray-300">{seriesData.creator}</p>
                </div>
                <div>
                  <h4 className="font-semibold text-white mb-2">Genre</h4>
                  <p className="text-gray-300">{seriesData.genre.join(", ")}</p>
                </div>
                <div className="md:col-span-2">
                  <h4 className="font-semibold text-white mb-2">Cast</h4>
                  <div className="flex flex-wrap gap-2">
                    {seriesData.cast.map((actor) => (
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
            {/* Seasons Download Section */}
            <Card className="mb-8 bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-8">
                <h2 className="text-3xl font-bold text-white mb-6 flex items-center">
                  <Download className="w-8 h-8 mr-3 text-purple-400" />
                  Download {seriesData.title} - All Seasons
                </h2>

                <Accordion type="single" collapsible className="w-full space-y-4">
                  {seriesData.seasonsData.map((seasonData) => (
                    <AccordionItem
                      key={seasonData.season}
                      value={`season-${seasonData.season}`}
                      className="border border-white/20 rounded-xl bg-white/5 backdrop-blur-sm"
                    >
                      <AccordionTrigger className="px-6 py-4 hover:no-underline">
                        <div className="flex items-center justify-between w-full">
                          <div className="flex items-center space-x-4">
                            <Badge className="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                              Season {seasonData.season}
                            </Badge>
                            <span className="text-white font-semibold">
                              {seasonData.episodes} Episodes ({seasonData.year})
                            </span>
                          </div>
                          <div className="text-sm text-gray-400">Click to view downloads</div>
                        </div>
                      </AccordionTrigger>
                      <AccordionContent className="px-6 pb-6">
                        <p className="text-gray-300 mb-6">{seasonData.description}</p>
                        <div className="space-y-4">
                          {seasonData.downloads.map((download, index) => (
                            <SeriesDownloadCard
                              key={index}
                              download={download}
                              seriesTitle={seriesData.title}
                              season={seasonData.season}
                            />
                          ))}
                        </div>
                      </AccordionContent>
                    </AccordionItem>
                  ))}
                </Accordion>

                {/* Complete Series Download */}
                <div className="mt-8 p-6 border border-white/20 rounded-xl bg-gradient-to-r from-purple-500/10 to-blue-500/10 backdrop-blur-sm">
                  <h3 className="text-2xl font-bold text-white mb-4 flex items-center">
                    <Zap className="w-6 h-6 mr-2 text-yellow-400" />
                    Complete Series Pack
                  </h3>
                  <p className="text-gray-300 mb-4">
                    Download all {seriesData.seasons} seasons in one go. Perfect for binge-watching!
                  </p>
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="p-4 bg-white/10 rounded-lg">
                      <h4 className="font-semibold text-white mb-2">4K UHD Complete Pack</h4>
                      <p className="text-sm text-gray-300 mb-3">All seasons in 4K quality with multi-audio</p>
                      <div className="flex items-center justify-between mb-3">
                        <span className="text-gray-400">Size:</span>
                        <span className="text-white font-semibold">95.2 GB</span>
                      </div>
                      <Button className="w-full bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 text-white">
                        <Download className="w-4 h-4 mr-2" />
                        Download 4K Pack
                      </Button>
                    </div>
                    <div className="p-4 bg-white/10 rounded-lg">
                      <h4 className="font-semibold text-white mb-2">1080p Complete Pack</h4>
                      <p className="text-sm text-gray-300 mb-3">All seasons in 1080p quality with dual audio</p>
                      <div className="flex items-center justify-between mb-3">
                        <span className="text-gray-400">Size:</span>
                        <span className="text-white font-semibold">58.2 GB</span>
                      </div>
                      <Button className="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white">
                        <Download className="w-4 h-4 mr-2" />
                        Download 1080p Pack
                      </Button>
                    </div>
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Related Series */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-8">
                <h3 className="text-2xl font-bold text-white mb-6">Similar TV Series</h3>
                <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                  {relatedSeries.map((series) => (
                    <Link key={series.id} href={`/series/${series.id}`} className="group">
                      <div className="relative">
                        <Image
                          src={series.poster || "/placeholder.svg"}
                          alt={series.title}
                          width={200}
                          height={300}
                          className="w-full h-48 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300"
                        />
                        <Badge className="absolute top-2 left-2 bg-green-500/80 text-white text-xs">
                          {series.quality}
                        </Badge>
                        <Badge className="absolute top-2 right-2 bg-blue-500/80 text-white text-xs">
                          {series.seasons}S
                        </Badge>
                        <div className="absolute bottom-2 right-2 flex items-center space-x-1 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
                          <Star className="w-3 h-3 fill-yellow-400 text-yellow-400" />
                          <span>{series.rating}</span>
                        </div>
                      </div>
                      <h4 className="font-semibold text-white mt-2 group-hover:text-purple-400 transition-colors text-sm">
                        {series.title}
                      </h4>
                      <p className="text-xs text-gray-400">{series.year}</p>
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
                  placeholder="Search series..."
                  className="bg-white/10 border-white/20 text-white placeholder:text-gray-400 mb-4"
                />
                <Button className="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white">
                  Search
                </Button>
              </CardContent>
            </Card>

            {/* Series Stats */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Series Stats</h3>
                <div className="space-y-4">
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Total Views</span>
                    <span className="text-white font-semibold">{seriesData.views}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Likes</span>
                    <span className="text-white font-semibold">{seriesData.likes}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Seasons</span>
                    <span className="text-white font-semibold">{seriesData.seasons}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">Episodes</span>
                    <span className="text-white font-semibold">{seriesData.totalEpisodes}</span>
                  </div>
                  <div className="flex items-center justify-between">
                    <span className="text-gray-400">IMDb Rating</span>
                    <span className="text-white font-semibold">{seriesData.imdbRating}/10</span>
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Popular Tags */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Popular Tags</h3>
                <div className="flex flex-wrap gap-2">
                  {seriesData.tags.map((tag) => (
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

            {/* Season Quick Links */}
            <Card className="bg-white/5 border-white/10 backdrop-blur-sm">
              <CardContent className="p-6">
                <h3 className="font-semibold text-white mb-4">Quick Season Access</h3>
                <div className="grid grid-cols-3 gap-2">
                  {seriesData.seasonsData.map((season) => (
                    <Button
                      key={season.season}
                      variant="outline"
                      size="sm"
                      className="border-white/20 text-white hover:bg-purple-500/20 hover:border-purple-500/50"
                    >
                      S{season.season}
                    </Button>
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

function SeriesDownloadCard({ download, seriesTitle, season }: { download: any; seriesTitle: string; season: number }) {
  return (
    <div className="border border-white/20 rounded-xl p-6 bg-gradient-to-r from-white/5 to-white/10 backdrop-blur-sm hover:from-white/10 hover:to-white/15 transition-all duration-300">
      <div className="flex items-start justify-between mb-4">
        <div>
          <h4 className="text-xl font-bold text-white mb-2">
            {seriesTitle} Season {season} ({download.quality})
          </h4>
          <div className="flex items-center space-x-4 text-sm text-gray-300">
            <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0">
              {download.quality}
            </Badge>
            <Badge className="bg-gradient-to-r from-blue-500 to-cyan-500 text-white border-0">
              {download.episodes}
            </Badge>
          </div>
        </div>
        <div className="text-right">
          <div className="text-2xl font-bold text-white">{download.size}</div>
          <div className="text-xs text-gray-400">Total Size</div>
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
        <h5 className="font-semibold text-white">Download Options:</h5>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
          <Button className="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white">
            <Download className="w-4 h-4 mr-2" />
            Google Drive
          </Button>
          <Button className="w-full bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white">
            <Download className="w-4 h-4 mr-2" />
            Mega
          </Button>
          <Button className="w-full bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white">
            <Download className="w-4 h-4 mr-2" />
            Torrent
          </Button>
        </div>
      </div>
    </div>
  )
}
